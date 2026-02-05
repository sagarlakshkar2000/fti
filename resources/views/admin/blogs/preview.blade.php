@extends('layouts.admin')

@section('title', 'Preview: ' . $blog->title)

@section('content')
<div class="max-w-5xl mx-auto">
    <!-- Header -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <div class="flex justify-between items-start">
            <div>
                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium
                    {{ $blog->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ ucfirst($blog->status) }}
                </span>
                <h1 class="text-3xl font-bold text-gray-900 mt-4">{{ $blog->title }}</h1>
                <p class="text-sm text-gray-500 mt-2">
                    Category: <span class="font-medium">{{ $blog->category }}</span> |
                    Reading Time: {{ $blog->sections['other_data']['reading_time'] ?? 5 }} min
                </p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.blogs.edit', $blog) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Edit
                </a>
                <a href="{{ route('admin.blogs.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Back to List
                </a>
            </div>
        </div>

        @if($blog->main_image)
        <div class="mt-6">
            <img src="{{ Str::startsWith($blog->main_image, 'http') ? $blog->main_image : asset('storage/' . $blog->main_image) }}"
                alt="{{ $blog->title }}"
                class="w-full h-96 object-cover rounded-lg">
        </div>
        @endif
    </div>

    <!-- Blog Content -->
    <div class="bg-white shadow rounded-lg p-8">

        <!-- Intro -->
        @if(isset($blog->sections['intro']))
        <section class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $blog->sections['intro']['heading'] ?? '' }}</h2>
            <div class="prose prose-lg max-w-none text-gray-700">
                {!! $blog->sections['intro']['content'] ?? '' !!}
            </div>
            @if(isset($blog->sections['intro']['images']) && is_array($blog->sections['intro']['images']))
            <div class="grid grid-cols-2 gap-4 mt-4">
                @foreach($blog->sections['intro']['images'] as $img)
                <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}" class="rounded-lg" alt="Intro Image">
                @endforeach
            </div>
            @endif
        </section>
        @endif

        <!-- Main Sections -->
        @if(isset($blog->sections['main_sections']) && is_array($blog->sections['main_sections']))
        @foreach($blog->sections['main_sections'] as $section)
        @if(!empty($section['heading']) || !empty($section['content']))
        <section class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $section['heading'] ?? '' }}</h2>
            <div class="prose prose-lg max-w-none text-gray-700">
                {!! $section['content'] ?? '' !!}
            </div>
            @if(isset($section['images']) && is_array($section['images']))
            <div class="grid grid-cols-2 gap-4 mt-4">
                @foreach($section['images'] as $img)
                <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}" class="rounded-lg" alt="Section Image">
                @endforeach
            </div>
            @endif
        </section>
        @endif
        @endforeach
        @endif

        <!-- Highlights -->
        @if(isset($blog->sections['highlights']) && !empty($blog->sections['highlights']['content']))
        <section class="mb-8 bg-blue-50 p-6 rounded-lg">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $blog->sections['highlights']['heading'] ?? 'Highlights' }}</h2>
            <div class="prose prose-lg max-w-none text-gray-700">
                {!! $blog->sections['highlights']['content'] ?? '' !!}
            </div>
        </section>
        @endif

        <!-- FAQ -->
        @if(isset($blog->sections['faq']) && !empty($blog->sections['faq']['content']))
        <section class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $blog->sections['faq']['heading'] ?? 'FAQ' }}</h2>
            <div class="prose prose-lg max-w-none text-gray-700">
                {!! $blog->sections['faq']['content'] ?? '' !!}
            </div>
        </section>
        @endif

        <!-- Conclusion -->
        @if(isset($blog->sections['conclusion']) && !empty($blog->sections['conclusion']['content']))
        <section class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $blog->sections['conclusion']['heading'] ?? 'Conclusion' }}</h2>
            <div class="prose prose-lg max-w-none text-gray-700">
                {!! $blog->sections['conclusion']['content'] ?? '' !!}
            </div>
        </section>
        @endif

        <!-- Tags -->
        @if($blog->tags && count($blog->tags) > 0)
        <div class="mt-8 pt-6 border-t border-gray-200">
            <h3 class="text-sm font-medium text-gray-500 mb-2">Tags:</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($blog->tags as $tag)
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                    {{ $tag }}
                </span>
                @endforeach
            </div>
        </div>
        @endif

        <!-- SEO Meta (For Reference) -->
        <div class="mt-8 pt-6 border-t border-gray-200 bg-gray-50 p-4 rounded">
            <h3 class="text-sm font-bold text-gray-700 mb-2">SEO Metadata (Admin View Only)</h3>
            <p class="text-sm text-gray-600"><strong>Meta Title:</strong> {{ $blog->meta_title }}</p>
            <p class="text-sm text-gray-600"><strong>Meta Description:</strong> {{ $blog->meta_description }}</p>
        </div>
    </div>
</div>
@endsection
