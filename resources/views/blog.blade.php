@extends('layouts.app')

@section('title', $title)
@section('meta_description', $meta_description)

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-12 text-center">
        <h1 class="text-4xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Our Blog</h1>
        <p class="text-lg text-[#706f6c] dark:text-[#A1A09A]">Latest news, updates, and insights from our team.</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($blogs as $blog)
        <article class="bg-white dark:bg-zinc-900 rounded-lg overflow-hidden border border-[#e3e3e0] dark:border-[#3E3E3A] hover:shadow-md transition flex flex-col h-full">
            <div class="h-48 bg-gray-200 w-full relative">
                @if($blog->main_image)
                <img src="{{ Str::startsWith($blog->main_image, 'http') ? $blog->main_image : asset('storage/' . $blog->main_image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
                @else
                <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                @endif
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <div class="flex items-center gap-2 text-xs text-[#706f6c] dark:text-[#A1A09A] mb-3">
                    <span class="px-2 py-1 bg-[#FF2D20]/10 text-[#FF2D20] rounded-full font-medium">{{ $blog->category }}</span>
                    <span>&bull;</span>
                    <span>{{ $blog->created_at->format('M d, Y') }}</span>
                </div>
                <h2 class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-3">
                    <a href="{{ url('/blog/' . $blog->slug) }}" class="hover:text-[#FF2D20] transition">{{ $blog->title }}</a>
                </h2>
                <div class="text-[#706f6c] dark:text-[#A1A09A] mb-4 line-clamp-3 prose prose-sm">
                    {!! Str::limit(strip_tags($blog->sections['intro']['content'] ?? $blog->meta_description), 150) !!}
                </div>
                <div class="mt-auto pt-4">
                    <a href="{{ url('/blog/' . $blog->slug) }}" class="text-[#FF2D20] font-medium hover:underline inline-flex items-center">
                        Read more <span class="ml-1">&rarr;</span>
                    </a>
                </div>
            </div>
        </article>
        @empty
        <div class="col-span-full text-center py-12">
            <p class="text-xl text-gray-500">No blog posts found.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $blogs->links() }}
    </div>
    @endsection
