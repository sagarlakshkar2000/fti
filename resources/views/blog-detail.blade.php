@extends('layouts.app')

@section('title', $title)
@section('meta_description', $meta_description)

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Article Header -->
    <div class="mb-8">
        <div class="flex items-center gap-2 text-sm text-[#706f6c] dark:text-[#A1A09A] mb-4">
            <span class="px-3 py-1 bg-[#FF2D20]/10 text-[#FF2D20] rounded-full font-medium">Technology</span>
            <span>&bull;</span>
            <span>Oct 12, 2023</span>
            <span>&bull;</span>
            <span>5 min read</span>
        </div>
        <h1 class="text-3xl md:text-5xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-6 leading-tight">
            The Future of Web Development: Trends to Watch
        </h1>
        <div class="flex items-center gap-4 border-b border-[#e3e3e0] dark:border-[#3E3E3A] pb-8">
            <div class="w-12 h-12 bg-gray-200 rounded-full"></div>
            <div>
                <h4 class="font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Alex Morgan</h4>
                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Editor in Chief</p>
            </div>
        </div>
    </div>

    <!-- Article Image -->
    <div class="w-full h-80 md:h-[500px] bg-gray-200 rounded-lg mb-10"></div>

    <!-- Article Content -->
    <article class="prose prose-lg dark:prose-invert max-w-none text-[#1b1b18] dark:text-[#EDEDEC]">
        <p class="text-xl leading-relaxed mb-6 text-[#706f6c] dark:text-[#A1A09A]">
            The web development landscape is constantly evolving, with new tools, frameworks, and methodologies emerging at a rapid pace. As we look ahead, several key trends are poised to shape the future of how we build and interact with the web.
        </p>

        <h2 class="text-2xl font-bold mb-4 mt-8">Checking WebAssembly into Maintenance</h2>
        <p class="mb-4 text-[#706f6c] dark:text-[#A1A09A]">
            WebAssembly (Wasm) is opening up new possibilities for high-performance applications in the browser. By allowing code written in languages like C++, Rust, and Go to run at near-native speed, Wasm is enabling complex applications like video editors and game engines to run smoothly on the web.
        </p>

        <h2 class="text-2xl font-bold mb-4 mt-8">The Rise of Server-Side Rendering (SSR)</h2>
        <p class="mb-4 text-[#706f6c] dark:text-[#A1A09A]">
            While Single Page Applications (SPAs) have dominated in recent years, there's a growing shift back towards Server-Side Rendering. Frameworks like Next.js and Laravel are making it easier than ever to build hybrid applications that offer the best of both worlds: fast initial load times and dynamic interactivity.
        </p>

        <h2 class="text-2xl font-bold mb-4 mt-8">AI-Powered Development</h2>
        <p class="mb-4 text-[#706f6c] dark:text-[#A1A09A]">
            Artificial Intelligence is becoming an integral part of the developer workflow. From code generation tools to intelligent debugging assistants, AI is helping developers write better code faster. Expect to see even deeper integration of AI into our daily tools.
        </p>

        <blockquote class="border-l-4 border-[#FF2D20] pl-6 italic text-xl my-8 text-[#1b1b18] dark:text-[#EDEDEC]">
            "The best way to predict the future is to create it."
        </blockquote>

        <p class="mb-4 text-[#706f6c] dark:text-[#A1A09A]">
            As technology continues to advance, the most successful developers will be those who remain curious and adaptable. Embracing lifelong learning is no longer optional; it's a necessity in this fast-paced industry.
        </p>
    </article>

    <!-- Post Navigation -->
    <div class="border-t border-[#e3e3e0] dark:border-[#3E3E3A] mt-12 pt-8 flex justify-between">
        <a href="#" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#FF2D20] transition font-medium">
            &larr; Previous Post
        </a>
        <a href="{{ url('/blog') }}" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#FF2D20] transition font-medium">
            Back to Blog
        </a>
        <a href="#" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#FF2D20] transition font-medium">
            Next Post &rarr;
        </a>
    </div>
</div>
@endsection
