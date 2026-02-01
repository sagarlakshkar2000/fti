@extends('layouts.app')

@php
$info = config('contact');
@endphp

@section('content')
<!-- Breadcrumb Section -->
<section class="bg-gradient-to-r from-orange-600 to-amber-500 py-14">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-white text-sm">
            <a href="index.php" class="hover:text-orange-200 transition duration-300">
                <i class="fas fa-home"></i> Home
            </a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-orange-200 font-semibold">About Us</span>
        </div>
        <h3 class="text-3xl md:text-4xl font-bold text-white mt-4">About Famous Tours India</h3>
        <p class="text-orange-100 text-lg mt-2">Your Trusted Travel Partner in Rajasthan</p>
    </div>
</section>

<!-- Hero About Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Welcome to <span class="text-orange-600">Famous Tours India</span>
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    Founded with a vision to revolutionize travel experiences in Rajasthan, Famous Tours India has been serving thousands of satisfied customers with reliable, affordable, and comfortable taxi services across the royal state and beyond.
                </p>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Based in the heart of Jaipur - the Pink City, we understand the unique travel needs of both tourists and locals. Our fleet of well-maintained vehicles and professional drivers ensure that every journey with us is safe, punctual, and memorable.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="contact.php"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center justify-center gap-2">
                        <i class="fas fa-phone"></i> Contact Us
                    </a>
                    <a href="tel:{{ $info['phone'] }}"
                        class="border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 flex items-center justify-center gap-2">
                        <i class="fas fa-car"></i> Book Now
                    </a>
                </div>
            </div>

            <!-- Image -->
            <div class="relative">
                <div class="bg-gradient-to-br from-orange-500 to-amber-500 rounded-2xl p-2 transform rotate-2">
                    <img src="{{ asset('assets/images/about-image.webp') }}"
                        alt="Jaipur City View"
                        class="rounded-2xl shadow-2xl transform -rotate-2 w-full h-80 object-contain md:object-fill">
                </div>
                <div class="absolute -bottom-15 md:-bottom-20 -left-6 bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="flex items-center gap-4">
                        <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                            <i class="fas fa-taxi text-2xl"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-gray-900">10K+</div>
                            <div class="text-gray-600 text-sm">Happy Customers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose Famous Tours India?</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">We go the extra mile to make your journey comfortable and memorable</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center group hover:transform hover:scale-105 transition duration-300">
                <div class="bg-orange-100 text-orange-600 p-4 rounded-xl inline-block mb-4 group-hover:bg-orange-500 group-hover:text-white transition duration-300">
                    <i class="fas fa-shield-alt text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Safe & Reliable</h3>
                <p class="text-gray-600">Well-maintained vehicles with experienced drivers and comprehensive insurance coverage.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center group hover:transform hover:scale-105 transition duration-300">
                <div class="bg-orange-100 text-orange-600 p-4 rounded-xl inline-block mb-4 group-hover:bg-orange-500 group-hover:text-white transition duration-300">
                    <i class="fas fa-clock text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Punctual Service</h3>
                <p class="text-gray-600">On-time pickups and drops with real-time tracking and 24/7 customer support.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center group hover:transform hover:scale-105 transition duration-300">
                <div class="bg-orange-100 text-orange-600 p-4 rounded-xl inline-block mb-4 group-hover:bg-orange-500 group-hover:text-white transition duration-300">
                    <i class="fas fa-indian-rupee-sign text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Affordable Rates</h3>
                <p class="text-gray-600">Competitive pricing with no hidden charges. Transparent billing for all services.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center group hover:transform hover:scale-105 transition duration-300">
                <div class="bg-orange-100 text-orange-600 p-4 rounded-xl inline-block mb-4 group-hover:bg-orange-500 group-hover:text-white transition duration-300">
                    <i class="fas fa-headset text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">24/7 Support</h3>
                <p class="text-gray-600">Round-the-clock customer service for bookings, support, and emergency assistance.</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Services Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p class="text-gray-600 text-lg">Comprehensive taxi solutions for all your travel needs</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-gradient-to-br from-orange-500 to-amber-500 rounded-2xl p-6 text-white group hover:transform hover:scale-105 transition duration-300">
                <div class="bg-white/20 p-4 rounded-xl inline-block mb-4">
                    <i class="fas fa-plane text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Airport Transfers</h3>
                <p class="text-orange-100">Timely pickups and drops from Jaipur Airport to any destination in Rajasthan.</p>
                <ul class="mt-4 space-y-2 text-orange-100">
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        <span>Flight tracking</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        <span>Meet & greet</span>
                    </li>
                </ul>
            </div>

            <!-- Service 2 -->
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white group hover:transform hover:scale-105 transition duration-300">
                <div class="bg-white/20 p-4 rounded-xl inline-block mb-4">
                    <i class="fas fa-train text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Railway Station Taxi</h3>
                <p class="text-blue-100">Hassle-free transfers from Jaipur Junction to hotels and tourist spots.</p>
                <ul class="mt-4 space-y-2 text-blue-100">
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        <span>Train schedule tracking</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        <span>Luggage assistance</span>
                    </li>
                </ul>
            </div>

            <!-- Service 3 -->
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white group hover:transform hover:scale-105 transition duration-300">
                <div class="bg-white/20 p-4 rounded-xl inline-block mb-4">
                    <i class="fas fa-map-marked-alt text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Local Sightseeing</h3>
                <p class="text-green-100">Explore Jaipur's heritage sites with knowledgeable local drivers.</p>
                <ul class="mt-4 space-y-2 text-green-100">
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        <span>Flexible packages</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        <span>Multi-language support</span>
                    </li>
                </ul>
            </div>

            <!-- Service 4 -->
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white group hover:transform hover:scale-105 transition duration-300">
                <div class="bg-white/20 p-4 rounded-xl inline-block mb-4">
                    <i class="fas fa-route text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Outstation Tours</h3>
                <p class="text-purple-100">Comfortable long-distance travel across Rajasthan and neighboring states.</p>
                <ul class="mt-4 space-y-2 text-purple-100">
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        <span>Multi-day packages</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        <span>Hotel coordination</span>
                    </li>
                </ul>
            </div>

            <!-- Service 5 -->
            <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-2xl p-6 text-white group hover:transform hover:scale-105 transition duration-300">
                <div class="bg-white/20 p-4 rounded-xl inline-block mb-4">
                    <i class="fas fa-heart text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Wedding & Events</h3>
                <p class="text-red-100">Premium taxi services for weddings, corporate events, and special occasions.</p>
                <ul class="mt-4 space-y-2 text-red-100">
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        <span>Decorated vehicles</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        <span>Bulk booking discounts</span>
                    </li>
                </ul>
            </div>

            <!-- Service 6 -->
            <div class="bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl p-6 text-white group hover:transform hover:scale-105 transition duration-300">
                <div class="bg-white/20 p-4 rounded-xl inline-block mb-4">
                    <i class="fas fa-briefcase text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Corporate Taxi</h3>
                <p class="text-teal-100">Reliable transportation solutions for business travelers and corporate clients.</p>
                <ul class="mt-4 space-y-2 text-teal-100">
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        <span>Monthly contracts</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-sm"></i>
                        <span>Professional drivers</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Fleet Section -->
<x-fleet />

<!-- Stats Section -->
<section class="px-4 py-16 bg-gradient-to-br from-amber-50 to-orange-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 text-center bg-gradient-to-br from-amber-50 to-orange-50">
            <div class="bg-white p-4 md:p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="text-xl md:text-2xl lg:text-3xl font-bold text-orange-600 mb-2">10K+</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Happy Customers</div>
            </div>
            <div class="bg-white p-4 md:p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="text-xl md:text-2xl lg:text-3xl font-bold text-orange-600 mb-2">24/7</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Service Available</div>
            </div>
            <div class="bg-white p-4 md:p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="text-xl md:text-2xl lg:text-3xl font-bold text-orange-600 mb-2">50+</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Vehicles Fleet</div>
            </div>
            <div class="bg-white p-4 md:p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="text-xl md:text-2xl lg:text-3xl font-bold text-orange-600 mb-2">4.9★</div>
                <div class="text-sm md:text-base text-gray-600 font-medium">Google Rating</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="px-4 py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl p-8 md:p-10 shadow-lg">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                <div class="text-center lg:text-left">
                    <h4 class="text-2xl md:text-3xl font-bold text-white mb-2">
                        Need a customized taxi service?
                    </h4>
                    <p class="text-orange-100 text-lg md:text-xl max-w-2xl">
                        We offer special packages for sightseeing and multi-city tours across Rajasthan
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <a href="tel:{{ $info['phone'] }}"
                        class="bg-white text-orange-600 hover:bg-gray-100 font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center gap-2 text-lg">
                        <i class="fas fa-phone"></i>
                        Enquire Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 bg-gray-50 bg-gradient-to-br from-amber-50 to-orange-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Customers Say</h2>
            <p class="text-gray-600 text-lg">Trusted by thousands of happy travellers across Rajasthan</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center gap-1 text-amber-400 mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-gray-600 mb-4 italic">"Excellent service! The driver was punctual and the car was very clean. Highly recommended for airport transfers in Jaipur."</p>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">RS</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Rahul Sharma</h4>
                        <p class="text-gray-500 text-sm">Delhi to Jaipur Trip</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center gap-1 text-amber-400 mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-gray-600 mb-4 italic">"Booked for Khatu Shyam Ji darshan. Very professional drivers and comfortable journey. Will use again for sure!"</p>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">PS</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Priya Singh</h4>
                        <p class="text-gray-500 text-sm">Khatu Shyam Ji Tour</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                <div class="flex items-center gap-1 text-amber-400 mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="text-gray-600 mb-4 italic">"Great experience with Golden Triangle tour. The cab was well-maintained and driver was very knowledgeable about the routes."</p>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">AK</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Amit Kumar</h4>
                        <p class="text-gray-500 text-sm">Golden Triangle Tour</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
            <p class="text-gray-600 text-lg">Quick answers to common questions</p>
        </div>

        <div class="max-w-4xl mx-auto space-y-6">
            <!-- FAQ 1 -->
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                <h3 class="font-semibold text-gray-900 mb-2 flex items-center gap-3">
                    <i class="fas fa-question-circle text-orange-500"></i>
                    How do I book a taxi?
                </h3>
                <p class="text-gray-600">You can book through our website, call us directly at {{ $info['phone'] }}, or message us on WhatsApp for instant booking.</p>
            </div>

            <!-- FAQ 2 -->
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                <h3 class="font-semibold text-gray-900 mb-2 flex items-center gap-3">
                    <i class="fas fa-question-circle text-orange-500"></i>
                    What are your payment options?
                </h3>
                <p class="text-gray-600">We accept cash, UPI, and online payments. Corporate billing options are also available.</p>
            </div>

            <!-- FAQ 3 -->
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                <h3 class="font-semibold text-gray-900 mb-2 flex items-center gap-3">
                    <i class="fas fa-question-circle text-orange-500"></i>
                    Do you provide outstation services?
                </h3>
                <p class="text-gray-600">Yes, we provide taxi services for outstation trips across Rajasthan and neighboring states with experienced drivers.</p>
            </div>
        </div>
    </div>
</section>
@endsection
