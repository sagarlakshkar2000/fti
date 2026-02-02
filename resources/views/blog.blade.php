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
        <!-- Blog Post 1 -->
        <article class="bg-white dark:bg-zinc-900 rounded-lg overflow-hidden border border-[#e3e3e0] dark:border-[#3E3E3A] hover:shadow-md transition">
            <div class="h-48 bg-gray-200 w-full"></div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-xs text-[#706f6c] dark:text-[#A1A09A] mb-3">
                    <span class="px-2 py-1 bg-[#FF2D20]/10 text-[#FF2D20] rounded-full font-medium">Technology</span>
                    <span>&bull;</span>
                    <span>Oct 12, 2023</span>
                </div>
                <h2 class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-3">
                    <a href="{{ url('/blog-detail') }}" class="hover:text-[#FF2D20] transition">The Future of Web Development</a>
                </h2>
                <p class="text-[#706f6c] dark:text-[#A1A09A] mb-4 line-clamp-3">
                    Discover the latest trends and technologies shaping the future of the web. From AI to WebAssembly, here's what you need to know.
                </p>
                <a href="{{ url('/blog-detail') }}" class="text-[#FF2D20] font-medium hover:underline">Read more &rarr;</a>
            </div>
        </article>

        <!-- Blog Post 2 -->
        <article class="bg-white dark:bg-zinc-900 rounded-lg overflow-hidden border border-[#e3e3e0] dark:border-[#3E3E3A] hover:shadow-md transition">
            <div class="h-48 bg-gray-200 w-full"></div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-xs text-[#706f6c] dark:text-[#A1A09A] mb-3">
                    <span class="px-2 py-1 bg-[#FF2D20]/10 text-[#FF2D20] rounded-full font-medium">Design</span>
                    <span>&bull;</span>
                    <span>Oct 08, 2023</span>
                </div>
                <h2 class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-3">
                    <a href="{{ url('/blog-detail') }}" class="hover:text-[#FF2D20] transition">Mastering UI/UX Principles</a>
                </h2>
                <p class="text-[#706f6c] dark:text-[#A1A09A] mb-4 line-clamp-3">
                    Learn how to create intuitive and beautiful user interfaces that delight your users and improve conversion rates.
                </p>
                <a href="{{ url('/blog-detail') }}" class="text-[#FF2D20] font-medium hover:underline">Read more &rarr;</a>
            </div>
        </article>

        <!-- Blog Post 3 -->
        <article class="bg-white dark:bg-zinc-900 rounded-lg overflow-hidden border border-[#e3e3e0] dark:border-[#3E3E3A] hover:shadow-md transition">
            <div class="h-48 bg-gray-200 w-full"></div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-xs text-[#706f6c] dark:text-[#A1A09A] mb-3">
                    <span class="px-2 py-1 bg-[#FF2D20]/10 text-[#FF2D20] rounded-full font-medium">Business</span>
                    <span>&bull;</span>
                    <span>Sep 25, 2023</span>
                </div>
                <h2 class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-3">
                    <a href="{{ url('/blog-detail') }}" class="hover:text-[#FF2D20] transition">Scaling Your Startup</a>
                </h2>
                <p class="text-[#706f6c] dark:text-[#A1A09A] mb-4 line-clamp-3">
                    Key strategies and insights for growing your business from zero to one and beyond. Avoid common pitfalls.
                </p>
                <a href="{{ url('/blog-detail') }}" class="text-[#FF2D20] font-medium hover:underline">Read more &rarr;</a>
            </div>
        </article>

        <!-- Blog Post 4 -->
        <article class="bg-white dark:bg-zinc-900 rounded-lg overflow-hidden border border-[#e3e3e0] dark:border-[#3E3E3A] hover:shadow-md transition">
            <div class="h-48 bg-gray-200 w-full"></div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-xs text-[#706f6c] dark:text-[#A1A09A] mb-3">
                    <span class="px-2 py-1 bg-[#FF2D20]/10 text-[#FF2D20] rounded-full font-medium">Tutorial</span>
                    <span>&bull;</span>
                    <span>Sep 15, 2023</span>
                </div>
                <h2 class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-3">
                    <a href="{{ url('/blog-detail') }}" class="hover:text-[#FF2D20] transition">Getting Started with Laravel</a>
                </h2>
                <p class="text-[#706f6c] dark:text-[#A1A09A] mb-4 line-clamp-3">
                    A comprehensive guide for beginners to set up their first Laravel project and understand the MVC architecture.
                </p>
                <a href="{{ url('/blog-detail') }}" class="text-[#FF2D20] font-medium hover:underline">Read more &rarr;</a>
            </div>
        </article>

        <!-- Blog Post 5 -->
        <article class="bg-white dark:bg-zinc-900 rounded-lg overflow-hidden border border-[#e3e3e0] dark:border-[#3E3E3A] hover:shadow-md transition">
            <div class="h-48 bg-gray-200 w-full"></div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-xs text-[#706f6c] dark:text-[#A1A09A] mb-3">
                    <span class="px-2 py-1 bg-[#FF2D20]/10 text-[#FF2D20] rounded-full font-medium">Security</span>
                    <span>&bull;</span>
                    <span>Sep 01, 2023</span>
                </div>
                <h2 class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-3">
                    <a href="{{ url('/blog-detail') }}" class="hover:text-[#FF2D20] transition">Web Security Best Practices</a>
                </h2>
                <p class="text-[#706f6c] dark:text-[#A1A09A] mb-4 line-clamp-3">
                    Protect your applications and users with these essential security tips and implementation guides.
                </p>
                <a href="{{ url('/blog-detail') }}" class="text-[#FF2D20] font-medium hover:underline">Read more &rarr;</a>
            </div>
        </article>

        <!-- Blog Post 6 -->
        <article class="bg-white dark:bg-zinc-900 rounded-lg overflow-hidden border border-[#e3e3e0] dark:border-[#3E3E3A] hover:shadow-md transition">
            <div class="h-48 bg-gray-200 w-full"></div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-xs text-[#706f6c] dark:text-[#A1A09A] mb-3">
                    <span class="px-2 py-1 bg-[#FF2D20]/10 text-[#FF2D20] rounded-full font-medium">Career</span>
                    <span>&bull;</span>
                    <span>Aug 20, 2023</span>
                </div>
                <h2 class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-3">
                    <a href="{{ url('/blog-detail') }}" class="hover:text-[#FF2D20] transition">Landing Your First Tech Job</a>
                </h2>
                <p class="text-[#706f6c] dark:text-[#A1A09A] mb-4 line-clamp-3">
                    Expert advice on resume building, networking, and interviewing to help you break into the tech industry.
                </p>
                <a href="{{ url('/blog-detail') }}" class="text-[#FF2D20] font-medium hover:underline">Read more &rarr;</a>
            </div>
        </article>
    </div>
</div>
@endsection
