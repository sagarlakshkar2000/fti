@extends('layouts.admin')

@section('title', isset($blog) ? 'Edit Blog Post' : 'Create New Blog Post')

@section('content')
<div class="max-w-4xl mx-auto">
    <form action="{{ isset($blog) ? route('admin.blogs.update', $blog) : route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($blog))
        @method('PUT')
        @endif

        <div class="flex justify-between items-center bg-gray-50 p-3 rounded mb-4 border border-gray-200">
            <div class="flex items-center gap-3">
                <label for="aiModel" class="text-sm font-medium text-gray-700">AI Model:</label>
                <select id="aiModel" class="mt-1 block w-48 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="gemini-2.5-flash">Gemini 2.5 Flash</option>
                </select>
            </div>

            <button type="button" id="generateBtn" class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-2 px-4 rounded-md shadow-sm text-sm font-medium hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 flex items-center gap-2">
                <svg class="w-5 h-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Generate Content with AI
            </button>
        </div>

        <div class="grid grid-cols-1 gap-6">

            <div class="flex justify-end">
                <a href="{{ route('admin.blogs.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-3">
                    Cancel
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    {{ isset($blog) ? 'Update Blog Post' : 'Create Blog Post' }}
                </button>
            </div>

            <!-- Basic Information Card -->
            <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Basic Information</h3>
                        <p class="mt-1 text-sm text-gray-500">Title, category, and main imagery.</p>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2 space-y-6">

                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $blog->title ?? '') }}" required class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>

                        <!-- Slug -->
                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700">Slug (Optional, auto-generated)</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $blog->slug ?? '') }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>

                        <!-- Category & Status Row -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                <input type="text" name="category" id="category" value="{{ old('category', $blog->category ?? '') }}" required placeholder="e.g. Travel Guide" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="draft" {{ old('status', $blog->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status', $blog->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
                                </select>
                            </div>
                        </div>

                        <!-- Main Image -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Main Image</label>
                            <div class="mt-1 flex items-center">
                                @if(isset($blog) && $blog->main_image)
                                <div class="mr-4 w-20 h-20 bg-gray-100 rounded overflow-hidden">
                                    <img src="{{ Str::startsWith($blog->main_image, 'http') ? $blog->main_image : asset('storage/' . $blog->main_image) }}" class="object-cover w-full h-full">
                                </div>
                                @endif
                                <input type="file" name="main_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Sections -->
            <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="mb-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Content Sections</h3>
                    <p class="mt-1 text-sm text-gray-500">Fill in the content for each section of the blog post.</p>
                </div>

                <div class="space-y-4">

                    <!-- Intro Section -->
                    <details class="group bg-gray-50 rounded-lg p-2" open>
                        <summary class="cursor-pointer font-bold text-gray-900 p-2 hover:bg-gray-100 rounded flex justify-between items-center">
                            <span>1. Introduction</span>
                            <span class="text-gray-400 text-sm group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="p-4 space-y-4 border-t border-gray-200 mt-2">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Heading</label>
                                <input type="text" name="sections[intro][heading]" value="{{ old('sections.intro.heading', $blog->sections['intro']['heading'] ?? '') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Content (HTML allowed)</label>
                                <textarea name="sections[intro][content]" rows="4" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ old('sections.intro.content', $blog->sections['intro']['content'] ?? '') }}</textarea>
                            </div>
                            <!-- Images -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Images</label>
                                <input type="file" name="sections[intro][images][]" multiple class="mt-1 block w-full text-sm text-gray-500">
                                @if(isset($blog->sections['intro']['images']) && is_array($blog->sections['intro']['images']))
                                <div class="mt-2 flex gap-2">
                                    @foreach($blog->sections['intro']['images'] as $img)
                                    <input type="hidden" name="sections[intro][existing_images][]" value="{{ $img }}">
                                    <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}" class="h-12 w-12 object-cover rounded border">
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </details>

                    <!-- Main Sections (Dynamic Implementation later, simplified for static list of 5 for now or just one Big editor? No, let's stick to valid JSON structure) -->
                    <!-- For V1, we will implement a fixed number of main sections (e.g., 5) to avoid complex JS repeater logic, or just 3. Let's do 5 as per seed. -->
                    <details class="group bg-gray-50 rounded-lg p-2">
                        <summary class="cursor-pointer font-bold text-gray-900 p-2 hover:bg-gray-100 rounded flex justify-between items-center">
                            <span>2. Main Sections (Body)</span>
                            <span class="text-gray-400 text-sm group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <div class="p-4 space-y-6 border-t border-gray-200 mt-2">
                            <p class="text-xs text-gray-500 italic">Add up to 5 main content blocks. Leave empty if not needed.</p>
                            @php
                            $mainSections = $blog->sections['main_sections'] ?? [];
                            @endphp
                            @for($i = 0; $i < 5; $i++)
                                <div class="border border-gray-200 rounded p-4 bg-white">
                                <span class="text-xs font-bold text-gray-400 uppercase mb-2 block">Section {{ $i + 1 }}</span>
                                <div class="space-y-2">
                                    <input type="text" name="sections[main_sections][{{$i}}][heading]" placeholder="Heading" value="{{ $mainSections[$i]['heading'] ?? '' }}" class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                    <textarea name="sections[main_sections][{{$i}}][content]" placeholder="Content" rows="3" class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ $mainSections[$i]['content'] ?? '' }}</textarea>

                                    <!-- Image Upload for Section -->
                                    <div class="mt-2">
                                        <label class="block text-xs font-medium text-gray-700">Images</label>
                                        <input type="file" name="sections[main_sections][{{$i}}][images][]" multiple class="block w-full text-xs text-gray-500">
                                        @if(isset($mainSections[$i]['images']) && is_array($mainSections[$i]['images']))
                                        @foreach($mainSections[$i]['images'] as $img)
                                        <input type="hidden" name="sections[main_sections][{{$i}}][existing_images][]" value="{{ $img }}">
                                        <div class="inline-block mt-2 mr-2 relative">
                                            <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}" class="h-12 w-12 object-cover rounded border">
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                        </div>
                        @endfor
                </div>
                </details>

                <!-- Highlights -->
                <details class="group bg-gray-50 rounded-lg p-2">
                    <summary class="cursor-pointer font-bold text-gray-900 p-2 hover:bg-gray-100 rounded flex justify-between items-center">
                        <span>3. Highlights</span>
                        <span class="text-gray-400 text-sm group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <div class="p-4 space-y-4 border-t border-gray-200 mt-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Heading</label>
                            <input type="text" name="sections[highlights][heading]" value="{{ old('sections.highlights.heading', $blog->sections['highlights']['heading'] ?? '') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="sections[highlights][content]" rows="3" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ old('sections.highlights.content', $blog->sections['highlights']['content'] ?? '') }}</textarea>
                        </div>
                        <!-- Images -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Images</label>
                            <input type="file" name="sections[highlights][images][]" multiple class="mt-1 block w-full text-sm text-gray-500">
                            @if(isset($blog->sections['highlights']['images']) && is_array($blog->sections['highlights']['images']))
                            <div class="mt-2 flex gap-2">
                                @foreach($blog->sections['highlights']['images'] as $img)
                                <input type="hidden" name="sections[highlights][existing_images][]" value="{{ $img }}">
                                <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}" class="h-12 w-12 object-cover rounded border">
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </details>

                <!-- FAQ -->
                <details class="group bg-gray-50 rounded-lg p-2">
                    <summary class="cursor-pointer font-bold text-gray-900 p-2 hover:bg-gray-100 rounded flex justify-between items-center">
                        <span>4. FAQ</span>
                        <span class="text-gray-400 text-sm group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <div class="p-4 space-y-4 border-t border-gray-200 mt-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Heading</label>
                            <input type="text" name="sections[faq][heading]" value="{{ old('sections.faq.heading', $blog->sections['faq']['heading'] ?? '') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="sections[faq][content]" rows="3" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ old('sections.faq.content', $blog->sections['faq']['content'] ?? '') }}</textarea>
                        </div>
                    </div>
                </details>

                <!-- Conclusion -->
                <details class="group bg-gray-50 rounded-lg p-2">
                    <summary class="cursor-pointer font-bold text-gray-900 p-2 hover:bg-gray-100 rounded flex justify-between items-center">
                        <span>5. Conclusion</span>
                        <span class="text-gray-400 text-sm group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <div class="p-4 space-y-4 border-t border-gray-200 mt-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Heading</label>
                            <input type="text" name="sections[conclusion][heading]" value="{{ old('sections.conclusion.heading', $blog->sections['conclusion']['heading'] ?? '') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="sections[conclusion][content]" rows="3" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ old('sections.conclusion.content', $blog->sections['conclusion']['content'] ?? '') }}</textarea>
                        </div>
                        <!-- Images -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Images</label>
                            <input type="file" name="sections[conclusion][images][]" multiple class="mt-1 block w-full text-sm text-gray-500">
                            @if(isset($blog->sections['conclusion']['images']) && is_array($blog->sections['conclusion']['images']))
                            <div class="mt-2 flex gap-2">
                                @foreach($blog->sections['conclusion']['images'] as $img)
                                <input type="hidden" name="sections[conclusion][existing_images][]" value="{{ $img }}">
                                <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}" class="h-12 w-12 object-cover rounded border">
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </details>

            </div>
        </div>

        <!-- SEO & Metadata -->
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">SEO & Metadata</h3>
                    <p class="mt-1 text-sm text-gray-500">Optimize for search engines.</p>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ old('meta_title', $blog->meta_title ?? '') }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Meta Description</label>
                        <textarea name="meta_description" rows="2" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tags (comma separated)</label>
                        <input type="text" name="tags" value="{{ old('tags', isset($blog) && $blog->tags ? implode(', ', $blog->tags) : '') }}" placeholder="travel, india, summer" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Reading Time (mins)</label>
                        <input type="number" name="sections[other_data][reading_time]" value="{{ old('sections.other_data.reading_time', $blog->sections['other_data']['reading_time'] ?? '5') }}" class="mt-1 block w-24 shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.blogs.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-3">
                Cancel
            </a>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                {{ isset($blog) ? 'Update Blog Post' : 'Create Blog Post' }}
            </button>
        </div>

</div>
</form>
</div>

<script>
    // Fetch models on load
    document.addEventListener('DOMContentLoaded', async () => {
        const select = document.getElementById('aiModel');
        try {
            const response = await fetch('{{ route("admin.blogs.models") }}');
            if (!response.ok) throw new Error('Network response was not ok');

            const models = await response.json();

            if (Array.isArray(models) && models.length > 0) {
                // Only clear if we successfully got models
                select.innerHTML = '';
                models.forEach(model => {
                    const opt = document.createElement('option');
                    opt.value = model.id;
                    opt.textContent = model.name;
                    if (model.id.includes('2.5-flash')) opt.selected = true;
                    select.appendChild(opt);
                });
            } else {
                const opt = document.createElement('option');
                opt.value = 'gemini-2.5-flash';
                opt.textContent = 'Gemini 2.5 Flash (Default)';
                select.appendChild(opt);
            }
        } catch (e) {
            console.warn('Failed to fetch Gemini models, using default.', e);
            // Do nothing, leave the default "Gemini 2.5 Flash" option in place
        }
    });

    document.getElementById('generateBtn').addEventListener('click', async function() {
        const title = document.getElementById('title').value;
        const category = document.getElementById('category').value;
        const btn = this;
        const originalText = btn.innerHTML;

        if (!title || !category) {
            alert('Please enter a Title and Category first.');
            return;
        }

        if (!confirm('This will overwrite existing content fields. Continue?')) return;

        btn.disabled = true;
        btn.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Generating...';

        try {
            const response = await fetch('{{ route("admin.blogs.generate") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    title,
                    category
                })
            });

            const data = await response.json();

            if (response.ok) {
                // Populate Fields
                if (data.meta_title) document.querySelector('[name="meta_title"]').value = data.meta_title;
                if (data.meta_description) document.querySelector('[name="meta_description"]').value = data.meta_description;
                if (data.tags && Array.isArray(data.tags)) document.querySelector('[name="tags"]').value = data.tags.join(', ');

                // Sections
                const sections = data.sections;

                if (sections) {
                    // Reading Time
                    if (sections.other_data && sections.other_data.reading_time) {
                        document.querySelector('[name="sections[other_data][reading_time]"]').value = sections.other_data.reading_time;
                    }

                    // Intro
                    if (sections.intro) {
                        document.querySelector('[name="sections[intro][heading]"]').value = sections.intro.heading || '';
                        document.querySelector('[name="sections[intro][content]"]').value = sections.intro.content || '';
                    }

                    // Highlights
                    if (sections.highlights) {
                        document.querySelector('[name="sections[highlights][heading]"]').value = sections.highlights.heading || '';
                        document.querySelector('[name="sections[highlights][content]"]').value = sections.highlights.content || '';
                    }

                    // FAQ
                    if (sections.faq) {
                        document.querySelector('[name="sections[faq][heading]"]').value = sections.faq.heading || '';
                        document.querySelector('[name="sections[faq][content]"]').value = sections.faq.content || '';
                    }

                    // Conclusion
                    if (sections.conclusion) {
                        document.querySelector('[name="sections[conclusion][heading]"]').value = sections.conclusion.heading || '';
                        document.querySelector('[name="sections[conclusion][content]"]').value = sections.conclusion.content || '';
                    }

                    // Main Sections
                    if (sections.main_sections && Array.isArray(sections.main_sections)) {
                        sections.main_sections.forEach((section, index) => {
                            if (index < 5) { // Limit to 5 as per our form
                                const container = document.querySelector(`[name="sections[main_sections][${index}][heading]"]`).parentElement.parentElement;

                                document.querySelector(`[name="sections[main_sections][${index}][heading]"]`).value = section.heading || '';
                                document.querySelector(`[name="sections[main_sections][${index}][content]"]`).value = section.content || '';

                                // Handle Images - We'll add hidden inputs for the generator URLs so the controller can pick them up?
                                // Wait, our controller expects "existing_images" or file uploads.
                                // If we inject URLs as hidden "existing_images", the logic I wrote earlier:
                                // $request->input('sections')[$sectionKey]['existing_images']
                                // This will work PERFECTLY if we create those hidden inputs dynamically!

                                const imgContainer = container.querySelector('.mt-2');
                                // Remove existing dynamic images
                                const existing = imgContainer.querySelectorAll('.dynamic-img-wrapper');
                                existing.forEach(e => e.remove());

                                if (section.images && Array.isArray(section.images)) {
                                    section.images.forEach(url => {
                                        const div = document.createElement('div');
                                        div.className = 'inline-block mt-2 mr-2 relative dynamic-img-wrapper';
                                        div.innerHTML = `
                                        <input type="hidden" name="sections[main_sections][${index}][existing_images][]" value="${url}">
                                        <img src="${url}" class="h-12 w-12 object-cover rounded border">
                                     `;
                                        imgContainer.appendChild(div);
                                    });
                                }
                            }
                        });
                    }
                }
                alert('Content Generated Successfully!');
            } else {
                alert('Error: ' + (data.error || 'Unknown error'));
            }

        } catch (error) {
            console.error(error);
            alert('Failed to generate content. See console.');
        } finally {
            btn.disabled = false;
            btn.innerHTML = originalText;
        }
    });
</script>
@endsection
