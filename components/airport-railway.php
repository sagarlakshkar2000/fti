<?php
$custom_css = '
<style>
  /* Custom animations */
  .group:hover .group-hover\:scale-105 {
    transform: scale(1.05);
  }

  /* Smooth transitions */
  .transition-all {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 300ms;
  }

  /* Responsive image handling */
  @media (max-width: 768px) {
    .container {
      padding-left: 1rem;
      padding-right: 1rem;
    }
  }
</style>
';
?>

<section class="md:px-4 py-16 bg-gray-50">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
      <!-- Section Header -->
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
          Taxi Services by <span class="text-orange-600">Famous Tours India</span>
        </h2>
        <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
          Comfortable, punctual, and professional taxi services for all your travel needs across Rajasthan
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
        <!-- Airport Taxi Card -->
        <div class="group">
          <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100">
            <div class="relative overflow-hidden">
              <img
                src="https://cdn.pixabay.com/photo/2016/11/13/21/45/airport-1822133_1280.jpg"
                alt="Airport Taxi Service"
                class="w-full h-48 md:h-56 object-cover group-hover:scale-105 transition-transform duration-500">
              <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
              <div class="absolute top-4 right-4">
                <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                  Most Popular
                </span>
              </div>
              <div class="absolute bottom-4 left-4">
                <div class="bg-white/20 backdrop-blur-sm rounded-lg p-2">
                  <i class="fas fa-plane text-white text-xl"></i>
                </div>
              </div>
            </div>

            <div class="p-6 md:p-8">
              <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-3">
                Airport Taxi Pick-up & Drop
              </h3>
              <p class="text-gray-600 mb-6 leading-relaxed">
                Smooth, safe, and on-time transfers from Jaipur Airport to hotels or major cities across Rajasthan.
              </p>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
                <div class="flex items-center gap-3">
                  <div class="bg-orange-100 text-orange-600 p-2 rounded-lg">
                    <i class="fas fa-clock text-sm"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-700">On-Time Pick-up Guaranteed</span>
                </div>
                <div class="flex items-center gap-3">
                  <div class="bg-orange-100 text-orange-600 p-2 rounded-lg">
                    <i class="fas fa-car text-sm"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-700">Clean & Comfortable Vehicles</span>
                </div>
                <div class="flex items-center gap-3">
                  <div class="bg-orange-100 text-orange-600 p-2 rounded-lg">
                    <i class="fas fa-route text-sm"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-700">City & Outstation Transfers</span>
                </div>
                <div class="flex items-center gap-3">
                  <div class="bg-orange-100 text-orange-600 p-2 rounded-lg">
                    <i class="fas fa-headset text-sm"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-700">24/7 Customer Support</span>
                </div>
              </div>

              <a href="tel:<?php echo $phone; ?>"
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center justify-center gap-2">
                <i class="fas fa-phone-alt"></i>
                Call for Booking
              </a>
            </div>
          </div>
        </div>

        <!-- Railway Taxi Card -->
        <div class="group">
          <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100">
            <div class="relative overflow-hidden">
              <img
                src="https://cdn.pixabay.com/photo/2021/01/29/06/56/trains-5960009_1280.jpg"
                alt="Railway Taxi Service"
                class="w-full h-48 md:h-56 object-cover group-hover:scale-105 transition-transform duration-500">
              <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
              <div class="absolute bottom-4 left-4">
                <div class="bg-white/20 backdrop-blur-sm rounded-lg p-2">
                  <i class="fas fa-train text-white text-xl"></i>
                </div>
              </div>
            </div>

            <div class="p-6 md:p-8">
              <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-3">
                Railway Station Taxi Service
              </h3>
              <p class="text-gray-600 mb-6 leading-relaxed">
                Hassle-free transfers from Jaipur Junction to hotels, homes, or tourist spots with professional drivers.
              </p>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
                <div class="flex items-center gap-3">
                  <div class="bg-blue-100 text-blue-600 p-2 rounded-lg">
                    <i class="fas fa-map-marker-alt text-sm"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-700">Real-Time Tracking</span>
                </div>
                <div class="flex items-center gap-3">
                  <div class="bg-blue-100 text-blue-600 p-2 rounded-lg">
                    <i class="fas fa-location-arrow text-sm"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-700">Local & Outstation Rides</span>
                </div>
                <div class="flex items-center gap-3">
                  <div class="bg-blue-100 text-blue-600 p-2 rounded-lg">
                    <i class="fas fa-user-tie text-sm"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-700">Experienced Drivers</span>
                </div>
                <div class="flex items-center gap-3">
                  <div class="bg-blue-100 text-blue-600 p-2 rounded-lg">
                    <i class="fas fa-credit-card text-sm"></i>
                  </div>
                  <span class="text-sm font-medium text-gray-700">Online Booking Available</span>
                </div>
              </div>

              <a href="tel:<?php echo $phone; ?>"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center justify-center gap-2">
                <i class="fas fa-phone-alt"></i>
                Call for Booking
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Additional Info -->
      <div class="mt-12">
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
              <a href="tel:<?php echo $phone; ?>"
                class="bg-white text-orange-600 hover:bg-gray-100 font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center gap-2 text-lg">
                <i class="fas fa-phone"></i>
                Enquire Now
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Trust Indicators -->
      <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 text-center">
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
  </div>
</section>
