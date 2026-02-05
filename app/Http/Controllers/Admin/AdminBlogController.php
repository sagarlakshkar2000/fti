<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Gemini\Laravel\Facades\Gemini;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.form');
    }

    public function store(Request $request)
    {
        $data = $this->validateAndProcess($request);
        Blog::create($data);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.form', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $this->validateAndProcess($request, $blog);
        $blog->update($data);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }

    public function preview(Blog $blog)
    {
        return view('admin.blogs.preview', compact('blog'));
    }

    protected function validateAndProcess(Request $request, ?Blog $blog = null)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug' . ($blog ? ',' . $blog->id : ''),
            'category' => 'required|string',
            'tags' => 'nullable|string', // Comma separated
            'main_image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'sections' => 'nullable|array',
        ];

        $validated = $request->validate($rules);

        // Handle Slug
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle Tags
        if (!empty($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        } else {
            $validated['tags'] = [];
        }

        // Handle Main Image
        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('blogs', 'public');
            $validated['main_image'] = $path;
        } elseif ($blog && $blog->main_image) {
            // Keep existing image if not replacing (implicit)
        } else {
            // Ensure main_image is set to null for new blogs without image
            $validated['main_image'] = null;
        }

        // Handle Sections Images
        if (isset($validated['sections'])) {
            $validated['sections'] = $this->processSectionImages($validated['sections'], $request, $blog ? $blog->sections : []);
        }

        return $validated;
    }

    protected function processSectionImages(array $sections, Request $request, array $oldSections = [])
    {
        $keysWithImages = ['intro', 'highlights', 'booking_info', 'cta', 'conclusion', 'faq'];

        foreach ($keysWithImages as $sectionKey) {
            $images = [];

            // 1. Keep existing images
            if (isset($request->input('sections')[$sectionKey]['existing_images'])) {
                $images = $request->input('sections')[$sectionKey]['existing_images'];
            }

            // 2. Add new uploads
            if ($request->hasFile("sections.$sectionKey.images")) {
                $files = $request->file("sections.$sectionKey.images");
                foreach ($files as $file) {
                    $images[] = $file->store("blogs/sections", 'public');
                }
            }

            $sections[$sectionKey]['images'] = $images;
        }

        // Main Sections (Array)
        if (isset($sections['main_sections']) && is_array($sections['main_sections'])) {
            foreach ($sections['main_sections'] as $index => $section) {
                $images = [];

                // 1. Keep existing images
                if (isset($request->input('sections')['main_sections'][$index]['existing_images'])) {
                    $images = $request->input('sections')['main_sections'][$index]['existing_images'];
                }

                // 2. Add new uploads
                if ($request->hasFile("sections.main_sections.$index.images")) {
                    $files = $request->file("sections.main_sections.$index.images");
                    foreach ($files as $file) {
                        $images[] = $file->store("blogs/sections", 'public');
                    }
                }

                $sections['main_sections'][$index]['images'] = $images;
            }
        }

        return $sections;
    }

    public function generate(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'model' => 'nullable|string',
        ]);

        $title = $request->input('title');
        $category = $request->input('category');

        // Handle model selection, default to gemini-2.5-flash
        $modelName = $request->input('model') ?: 'gemini-2.5-flash';
        // Clean up model name if it comes as "models/gemini-..." which listModels returns
        $modelName = str_replace('models/', '', $modelName);

        $prompt = "You are a professional travel blog writer. Generate a complete, structured JSON for a travel blog post.

Title: '$title'
Category: '$category'

CRITICAL: Return ONLY valid JSON. No markdown, no explanations, no code blocks.

Structure (MUST match exactly):
{
    \"meta_title\": \"SEO-optimized title (50-60 chars)\",
    \"meta_description\": \"SEO description (150-160 chars)\",
    \"tags\": [\"tag1\", \"tag2\", \"tag3\"],
    \"sections\": {
        \"intro\": {
            \"heading\": \"Introduction heading\",
            \"content\": \"<p>Engaging intro paragraph with HTML tags</p>\"
        },
        \"main_sections\": [
            {
                \"heading\": \"Section 1 Heading\",
                \"content\": \"<p>Detailed content with HTML</p><p>Multiple paragraphs</p>\",
                \"images\": [\"https://picsum.photos/800/600?random=1\"]
            },
            {
                \"heading\": \"Section 2 Heading\",
                \"content\": \"<p>Content here</p>\",
                \"images\": [\"https://picsum.photos/800/600?random=2\"]
            }
        ],
        \"highlights\": {
            \"heading\": \"Key Highlights\",
            \"content\": \"<ul><li>Point 1</li><li>Point 2</li></ul>\"
        },
        \"faq\": {
            \"heading\": \"Frequently Asked Questions\",
            \"content\": \"<p><strong>Q:</strong> Question?</p><p><strong>A:</strong> Answer</p>\"
        },
        \"conclusion\": {
            \"heading\": \"Conclusion\",
            \"content\": \"<p>Wrap up the blog</p>\"
        },
        \"other_data\": {
            \"reading_time\": 5
        }
    }
}

REQUIREMENTS:
1. Create EXACTLY 5 items in 'main_sections' array
2. Each main_section must have: heading, content (HTML), images array
3. Use unique picsum URLs: https://picsum.photos/800/600?random=1, random=2, etc.
4. Content must use proper HTML tags: <p>, <ul>, <li>, <strong>, etc.
5. Ensure reading_time is realistic (calculate based on content length)
6. Generate relevant, SEO-friendly tags
7. Make content engaging, informative, and travel-focused
";

        try {
            // GenerativeAI Package Usage via Facade
            $result = Gemini::generativeModel(model: $modelName)->generateContent($prompt);
            $generatedText = $result->text();

            // Clean up markdown code blocks if Gemini sends them
            $generatedText = preg_replace('/^```json\s*/', '', $generatedText);
            $generatedText = preg_replace('/^```\s*/', '', $generatedText);
            $generatedText = preg_replace('/\s*```$/', '', $generatedText);

            $blogData = json_decode($generatedText, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                return response()->json($blogData);
            } else {
                return response()->json(['error' => 'Failed to parse AI response as JSON.', 'raw' => $generatedText], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Generation Failed: ' . $e->getMessage()], 500);
        }
    }

    public function getModels()
    {
        try {
            $response = Gemini::models()->list();
            $models = [];

            foreach ($response->models as $model) {
                // Filter for models that support content generation
                if (in_array('generateContent', $model->supportedGenerationMethods)) {
                    $models[] = [
                        'id' => $model->name, // e.g., "models/gemini-1.5-flash"
                        'name' => $model->displayName . " (" . str_replace('models/', '', $model->name) . ")"
                    ];
                }
            }

            return response()->json($models);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch models: ' . $e->getMessage()], 500);
        }
    }
}
