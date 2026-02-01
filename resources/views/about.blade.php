@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-12 text-center">
        <h1 class="text-4xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">About Us</h1>
        <p class="text-lg text-[#706f6c] dark:text-[#A1A09A]">We are a team of passionate individuals committed to delivering excellence.</p>
    </div>

    <!-- Company Story -->
    <div class="bg-white dark:bg-zinc-900 rounded-lg p-8 border border-[#e3e3e0] dark:border-[#3E3E3A] mb-12">
        <h2 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Our Story</h2>
        <p class="text-[#706f6c] dark:text-[#A1A09A] mb-4 leading-relaxed">
            Founded in 2020, we started with a simple mission: to make technology accessible and useful for everyone.
            What began as a small project in a garage has now grown into a global company serving thousands of customers.
        </p>
        <p class="text-[#706f6c] dark:text-[#A1A09A] leading-relaxed">
            Our values are rooted in innovation, integrity, and customer success. We believe in building products that not only solve problems but also inspire creativity and growth.
        </p>
    </div>

    <!-- Team Section -->
    <div>
        <h2 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-8 text-center">Meet the Team</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Team Member 1 -->
            <div class="bg-white dark:bg-zinc-900 rounded-lg p-6 border border-[#e3e3e0] dark:border-[#3E3E3A] text-center">
                <div class="w-24 h-24 bg-gray-200 rounded-full mx-auto mb-4"></div>
                <h3 class="font-bold text-lg text-[#1b1b18] dark:text-[#EDEDEC]">Alex Morgan</h3>
                <p class="text-sm text-[#FF2D20] mb-2">CEO & Founder</p>
                <p class="text-xs text-[#706f6c] dark:text-[#A1A09A]">Visionary leader with 15+ years of industry experience.</p>
            </div>
            <!-- Team Member 2 -->
            <div class="bg-white dark:bg-zinc-900 rounded-lg p-6 border border-[#e3e3e0] dark:border-[#3E3E3A] text-center">
                <div class="w-24 h-24 bg-gray-200 rounded-full mx-auto mb-4"></div>
                <h3 class="font-bold text-lg text-[#1b1b18] dark:text-[#EDEDEC]">Sarah Lee</h3>
                <p class="text-sm text-[#FF2D20] mb-2">Head of Design</p>
                <p class="text-xs text-[#706f6c] dark:text-[#A1A09A]">Award-winning designer passionate about user experience.</p>
            </div>
            <!-- Team Member 3 -->
            <div class="bg-white dark:bg-zinc-900 rounded-lg p-6 border border-[#e3e3e0] dark:border-[#3E3E3A] text-center">
                <div class="w-24 h-24 bg-gray-200 rounded-full mx-auto mb-4"></div>
                <h3 class="font-bold text-lg text-[#1b1b18] dark:text-[#EDEDEC]">David Chen</h3>
                <p class="text-sm text-[#FF2D20] mb-2">Lead Developer</p>
                <p class="text-xs text-[#706f6c] dark:text-[#A1A09A]">Full-stack wizard who loves clean code and coffee.</p>
            </div>
        </div>
    </div>
</div>
@endsection
