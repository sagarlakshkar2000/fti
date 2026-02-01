<div class="relative w-full h-[500px] md:h-[600px] overflow-hidden rounded-lg">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/40 z-10 flex flex-col items-center justify-center text-center px-4">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 tracking-tight drop-shadow-md">
            Explore the World with Us
        </h1>
        <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl drop-shadow-sm">
            Unforgettable journeys, curated just for you.
        </p>
        <div class="flex gap-4">
            <a href="{{ url('/contact') }}" class="px-8 py-3 bg-orange-500 text-white rounded-md font-semibold hover:bg-orange-600 transition shadow-lg">
                Book Now
            </a>
            <a href="{{ url('/about') }}" class="px-8 py-3 bg-white/20 backdrop-blur-sm border border-white/50 text-white rounded-md font-semibold hover:bg-white/30 transition shadow-lg">
                Learn More
            </a>
        </div>
    </div>

    <!-- Image -->
    <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2021&q=80"
        alt="Hero Background"
        class="absolute inset-0 w-full h-full object-cover">
</div>
