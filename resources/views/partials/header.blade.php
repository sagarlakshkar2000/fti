<header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden mx-auto">
    <nav class="flex items-center justify-between gap-4 p-4 bg-white/50 dark:bg-zinc-900/50 backdrop-blur-sm rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
        <div class="flex items-center gap-6">
            <a href="{{ url('/') }}" class="font-bold text-lg">Brand</a>
            <div class="hidden md:flex items-center gap-4">
                <a href="{{ url('/') }}" class="hover:text-[#FF2D20] transition bg-transparent">Home</a>
                <a href="{{ url('/about') }}" class="hover:text-[#FF2D20] transition bg-transparent">About Us</a>
                <a href="{{ url('/blog') }}" class="hover:text-[#FF2D20] transition bg-transparent">Blog</a>
                <a href="{{ url('/contact') }}" class="hover:text-[#FF2D20] transition bg-transparent">Contact</a>
            </div>
        </div>

        <div class="flex items-center gap-4">
            @if (Route::has('login'))
            @auth
            <a
                href="{{ url('/dashboard') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                Dashboard
            </a>
            @else
            <a
                href="{{ route('login') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                Log in
            </a>

            @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                Register
            </a>
            @endif
            @endauth
            @endif
        </div>
    </nav>
</header>
