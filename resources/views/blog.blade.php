@extends('layouts.app')

@section('title', $title)
@section('meta_description', $meta_description)

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-16 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-6 tracking-tight">Our Blog</h1>
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto">Latest travel stories, tips, and insights to inspire your next adventure.</p>
        </div>

        <!-- Blog Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($blogs as $blog)
            <article class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col h-full border-2 border-gray-100 hover:border-[#FF2D20]/30 hover:-translate-y-2">
                <!-- Image -->
                <div class="h-56 w-full relative overflow-hidden bg-gradient-to-br from-red-100 to-orange-100">
                    @if($blog->main_image)
                    <img src="{{ Str::startsWith($blog->main_image, 'http') ? $blog->main_image : asset('storage/' . $blog->main_image) }}"
                        alt="{{ $blog->title }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-20 h-20 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>

                <!-- Content -->
                <div class="p-6 md:p-8 flex flex-col flex-grow bg-white">
                    <!-- Meta Info -->
                    <div class="flex items-center gap-3 text-sm text-gray-600 mb-4 flex-wrap">
                        <span class="px-4 py-2 bg-gradient-to-r from-[#FF2D20] to-[#e0281b] text-white rounded-full font-semibold text-xs shadow-md">
                            {{ $blog->category }}
                        </span>
                        <span class="text-gray-500">•</span>
                        <span class="font-medium">{{ $blog->created_at->format('M d, Y') }}</span>
                    </div>

                    <!-- Title -->
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 leading-tight">
                        <a href="{{ url('/blog/' . $blog->slug) }}" class="hover:text-[#FF2D20] transition-colors duration-300">
                            {{ $blog->title }}
                        </a>
                    </h2>

                    <!-- Excerpt -->
                    <div class="text-base md:text-lg text-gray-700 mb-6 line-clamp-3 flex-grow leading-relaxed">
                        {!! Str::limit(strip_tags($blog->sections['intro']['content'] ?? $blog->meta_description), 150) !!}
                    </div>

                    <!-- Read More Button -->
                    <div class="mt-auto pt-4 border-t border-gray-100">
                        <a href="{{ url('/blog/' . $blog->slug) }}"
                            class="inline-flex items-center gap-2 text-[#FF2D20] font-bold text-lg hover:gap-4 transition-all duration-300 group-hover:text-[#e0281b]">
                            Read Full Story
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-span-full text-center py-20">
                <div class="bg-white rounded-2xl p-12 shadow-lg border-2 border-gray-200">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <p class="text-2xl font-bold text-gray-900 mb-2">No blog posts yet</p>
                    <p class="text-lg text-gray-600">Check back soon for exciting travel stories!</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($blogs->hasPages())
        <div class="mt-16">
            {{ $blogs->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
