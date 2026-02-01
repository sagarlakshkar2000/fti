@php
$header_assets = [
'google' => 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg', // Placeholder
'tripadvisor' => 'https://static.tacdn.com/img2/brand_refresh/Tripadvisor_lockup_horizontal_secondary_registered.svg', // Placeholder
'logo' => '/assets/images/logo.jpg', // Placeholder
];

$info = [
'phone' => '+91 123 456 7890',
'email' => 'info@famoustoursindia.com',
];

$nav_items = [
'Home' => url('/'),
'About' => url('/about'),
'Contact' => url('/contact'),
'Blog' => url('/blog'),
];
@endphp

<header class="sticky top-0 z-50 bg-white shadow-md">
    <div class="mx-auto">
        <!-- Top Bar with Ratings -->
        <div class="bg-black hidden md:flex justify-between items-center px-4 py-2">
            <div class="flex items-center space-x-6 text-sm text-white">
                <!-- Google Rating -->
                <div class="flex items-center space-x-2">
                    <div class="flex items-center">
                        <img src="{{ $header_assets['google'] }}" alt="Google" class="h-5 w-auto">
                    </div>
                    <div class="flex items-center space-x-1">
                        <span class="text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </span>
                        <span class="text-white font-semibold">4.9+</span>
                    </div>
                </div>

                <!-- TripAdvisor Rating -->
                <div class="flex items-center space-x-2">
                    <div class="flex items-center">
                        <img src="{{ $header_assets['tripadvisor'] }}" alt="TripAdvisor" class="h-5 w-auto bg-white rounded px-1">
                    </div>
                    <div class="flex items-center space-x-1">
                        <span class="text-green-600">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                        <span class="text-white font-semibold">4.4+</span>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="flex items-center space-x-4 text-sm">
                <div class="flex items-center space-x-1">
                    <i class="fas fa-phone text-white"></i>
                    <a href="tel:{{ preg_replace('/\s+/', '', $info['phone']) }}"
                        class="text-white hover:text-blue-400 transition-colors duration-200">
                        {{ $info['phone'] }}
                    </a>
                </div>
                <div class="flex items-center space-x-1">
                    <i class="fas fa-envelope text-white"></i>
                    <a href="mailto:{{ $info['email'] }}"
                        class="text-white hover:text-blue-400 transition-colors duration-200">
                        {{ $info['email'] }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="flex justify-between items-center relative px-4 py-2">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <div class="relative md:absolute md:top-2 md:left-5 md:z-10">
                    <img src="{{ $header_assets['logo'] }}" alt="FTI Travel" class="w-12 h-12 md:w-20 md:h-20 rounded-full border-2 border-white shadow-md">
                </div>
                <div class="hidden md:block md:pl-24">
                    <h3 class="md:text-2xl font-bold text-black uppercase tracking-wide">Famous Tours India</h3>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                @foreach ($nav_items as $label => $url)
                <a href="{{ $url }}"
                    class="font-medium text-black hover:text-orange-600 transition duration-300
            {{ request()->url() === $url ? 'text-orange-600 border-b-2 border-orange-600' : '' }}">
                    {{ $label }}
                </a>
                @endforeach

                <!-- Book Now Button -->
                <a href="{{ url('/contact') }}" class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-700 transition duration-300 font-medium shadow-sm">
                    Book Now
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden flex items-center space-x-4">
                <a href="{{ url('/contact') }}" class="bg-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-orange-700">
                    Book Now
                </a>
                <button id="mobile-menu-button" class="text-black p-2 rounded-lg hover:bg-gray-100 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden lg:hidden pb-4 border-t border-gray-200 absolute w-full bg-white shadow-lg">
            <!-- Mobile Ratings -->
            <div class="pt-6 pb-4 border-b border-gray-200">
                <div class="flex justify-around">
                    <!-- Google Rating Mobile -->
                    <div class="text-center">
                        <div class="flex items-center justify-center mb-1">
                            <img src="{{ $header_assets['google'] }}" alt="Google" class="h-6 w-auto">
                        </div>
                        <div class="flex items-center justify-center space-x-1">
                            <span class="text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </span>
                            <span class="text-black text-sm font-semibold">4.8</span>
                        </div>
                    </div>

                    <!-- TripAdvisor Rating Mobile -->
                    <div class="text-center">
                        <div class="flex items-center justify-center mb-1">
                            <img src="{{ $header_assets['tripadvisor'] }}" alt="TripAdvisor" class="h-6 w-auto bg-white border border-gray-200 rounded px-1">
                        </div>
                        <div class="flex items-center justify-center space-x-1">
                            <span class="text-green-600 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="text-black text-sm font-semibold">5.0</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Items -->
            <div class="py-4 space-y-1 px-2">
                @foreach ($nav_items as $label => $url)
                <a href="{{ $url }}"
                    class="block py-3 px-4 rounded-lg transition duration-300 text-black font-medium
            {{ request()->url() === $url ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50' }}">
                    {{ $label }}
                </a>
                @endforeach
            </div>

            <!-- Mobile Contact Info -->
            <div class="mt-2 p-4 bg-gray-50 mx-2 rounded-lg">
                <h3 class="font-semibold text-black mb-3">Contact Us</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-phone text-blue-600"></i>
                        <a href="tel:{{ preg_replace('/\s+/', '', $info['phone']) }}" class="text-black">
                            {{ $info['phone'] }}
                        </a>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-envelope text-blue-600"></i>
                        <a href="mailto:{{ $info['email'] }}" class="text-black">
                            {{ $info['email'] }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        if (menuButton && menu) {
            menuButton.addEventListener('click', function() {
                menu.classList.toggle('hidden');

                // Toggle icon
                const icon = this.querySelector('svg');
                if (menu.classList.contains('hidden')) {
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
                } else {
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
                }
            });

            // Close mobile menu when clicking on a link
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                    menuButton.querySelector('svg').innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
                });
            });
        }
    });
</script>
