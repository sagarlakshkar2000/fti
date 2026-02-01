@extends('layouts.app')

@section('content')
<div class="space-y-12">
    <!-- Hero Section -->
    <section class="text-center py-16 px-6 bg-white dark:bg-zinc-900 rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A]">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 text-[#1b1b18] dark:text-[#EDEDEC] tracking-tight">
            Welcome to Our <span class="text-[#FF2D20]">Awesome Platform</span>
        </h1>
        <p class="text-lg text-[#706f6c] dark:text-[#A1A09A] mb-8 max-w-2xl mx-auto">
            Build faster, scale better, and delight your users with our cutting-edge solutions.
            Start your journey today and experience the difference.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ url('/register') }}" class="px-8 py-3 bg-[#FF2D20] text-white rounded-md font-semibold hover:bg-[#e0261b] transition">
                Get Started
            </a>
            <a href="{{ url('/about') }}" class="px-8 py-3 bg-transparent border border-[#e3e3e0] dark:border-[#3E3E3A] text-[#1b1b18] dark:text-[#EDEDEC] rounded-md font-semibold hover:bg-gray-50 dark:hover:bg-zinc-800 transition">
                Learn More
            </a>
        </div>
    </section>

    <!-- Features Grid -->
    <section class="grid md:grid-cols-3 gap-6">
        <div class="p-6 bg-white dark:bg-zinc-900 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
            <div class="w-12 h-12 bg-[#FF2D20]/10 rounded-lg flex items-center justify-center mb-4 text-[#FF2D20]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold mb-2 text-[#1b1b18] dark:text-[#EDEDEC]">Lightning Fast</h3>
            <p class="text-[#706f6c] dark:text-[#A1A09A]">
                Optimized for speed and performance to ensure your users never have to wait.
            </p>
        </div>
        <div class="p-6 bg-white dark:bg-zinc-900 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
            <div class="w-12 h-12 bg-[#FF2D20]/10 rounded-lg flex items-center justify-center mb-4 text-[#FF2D20]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold mb-2 text-[#1b1b18] dark:text-[#EDEDEC]">Secure by Design</h3>
            <p class="text-[#706f6c] dark:text-[#A1A09A]">
                Enterprise-grade security features built-in to protect your data and privacy.
            </p>
        </div>
        <div class="p-6 bg-white dark:bg-zinc-900 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
            <div class="w-12 h-12 bg-[#FF2D20]/10 rounded-lg flex items-center justify-center mb-4 text-[#FF2D20]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                </svg>
            </div>
            <h3 class="text-xl font-bold mb-2 text-[#1b1b18] dark:text-[#EDEDEC]">Scalable Architecture</h3>
            <p class="text-[#706f6c] dark:text-[#A1A09A]">
                Grow without limits using our cloud-native infrastructure solutions.
            </p>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-12">
        <h2 class="text-3xl font-bold text-center mb-10 text-[#1b1b18] dark:text-[#EDEDEC]">Trusted by Industry Leaders</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <div class="p-6 bg-white/50 dark:bg-zinc-900/50 backdrop-blur-sm rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                <p class="italic text-[#706f6c] dark:text-[#A1A09A] mb-4">"This platform changed the way we work. Incredible results in record time."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                    <div>
                        <h4 class="font-bold text-sm text-[#1b1b18] dark:text-[#EDEDEC]">Sarah Johnson</h4>
                        <p class="text-xs text-[#706f6c] dark:text-[#A1A09A]">CTO, TechCorp</p>
                    </div>
                </div>
            </div>
            <div class="p-6 bg-white/50 dark:bg-zinc-900/50 backdrop-blur-sm rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                <p class="italic text-[#706f6c] dark:text-[#A1A09A] mb-4">"The best decision we made this year. Support is amazing and features are top-notch."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                    <div>
                        <h4 class="font-bold text-sm text-[#1b1b18] dark:text-[#EDEDEC]">Mike Williams</h4>
                        <p class="text-xs text-[#706f6c] dark:text-[#A1A09A]">Founder, StartupInc</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
