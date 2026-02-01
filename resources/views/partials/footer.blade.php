<footer class="w-full text-center text-sm text-[#706f6c] dark:text-[#A1A09A] py-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A] mt-12 bg-white/50 dark:bg-zinc-900/50 backdrop-blur-sm rounded-lg lg:max-w-4xl mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-center px-6 gap-4">
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
        <div class="flex gap-4">
            <a href="#" class="hover:text-[#FF2D20] transition">Privacy Policy</a>
            <a href="#" class="hover:text-[#FF2D20] transition">Terms of Service</a>
            <a href="#" class="hover:text-[#FF2D20] transition">Twitter</a>
            <a href="#" class="hover:text-[#FF2D20] transition">GitHub</a>
        </div>
    </div>
</footer>
