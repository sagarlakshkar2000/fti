<?php
$current_page = basename($_SERVER['PHP_SELF']);
include './utils/info.php';
$nav_items = [
  'Home' => 'index.php',
  'About' => 'about.php',
  'Contact' => 'contact.php'
];
?>

<footer class="bg-gray-900 text-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

      <!-- About Us -->
      <div class="lg:col-span-2">
        <div class="flex items-center gap-3 mb-4">
          <div class="rounded-lg">
            <img src="./public/assets/images/logo.jpg" alt="FTI Travel" class="w-full h-20 md:h-15 rounded-lg">
          </div>
          <h3 class="text-2xl font-bold text-white">Famous Tours India</h3>
        </div>
        <p class="text-gray-300 leading-relaxed mb-4">
          <strong class="text-white">Famous Tours India</strong> provides trusted and affordable travel and taxi services across Rajasthan and beyond. With years of experience, we specialize in airport transfers, city rides, local sightseeing, and outstation trips.
        </p>
        <p class="text-gray-300 leading-relaxed">
          Based in the heart of Jaipur, we are committed to offering safe, punctual, and comfortable journeys, ensuring a hassle-free travel experience for every customer.
        </p>
      </div>

      <!-- Useful Links -->
      <div>
        <h4 class="text-lg font-semibold text-white mb-4 border-b border-orange-500 pb-2">Quick Links</h4>
        <ul class="space-y-3">
          <li>
            <a href="/" class="text-gray-300 hover:text-orange-400 transition duration-300 flex items-center gap-2">
              <i class="fas fa-home text-orange-500 text-sm"></i>
              Home
            </a>
          </li>
          <li>
            <a href="/about" class="text-gray-300 hover:text-orange-400 transition duration-300 flex items-center gap-2">
              <i class="fas fa-info-circle text-orange-500 text-sm"></i>
              About
            </a>
          </li>
          <li>
            <a href="/contact" class="text-gray-300 hover:text-orange-400 transition duration-300 flex items-center gap-2">
              <i class="fas fa-phone text-orange-500 text-sm"></i>
              Contact Us
            </a>
          </li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div>
        <h4 class="text-lg font-semibold text-white mb-4 border-b border-orange-500 pb-2">Contact Info</h4>
        <div class="space-y-3">
          <div class="flex items-center gap-3">
            <div class="bg-orange-500 p-2 rounded-lg">
              <i class="fas fa-phone text-white text-sm"></i>
            </div>
            <div>
              <a href="tel:<?php echo $phone; ?>" class="text-white hover:text-orange-400 transition duration-300 font-semibold block">
                <?php echo $phone; ?>
              </a>
              <span class="text-gray-400 text-sm">Call us anytime</span>
            </div>
          </div>

          <div class="flex items-center gap-3">
            <div class="bg-orange-500 p-2 rounded-lg">
              <i class="fas fa-envelope text-white text-sm"></i>
            </div>
            <div>
              <a href="mailto:<?php echo $email; ?>" class="text-white hover:text-orange-400 transition duration-300 font-semibold block">
                <?php echo $email; ?>
              </a>
              <span class="text-gray-400 text-sm">Email us</span>
            </div>
          </div>
        </div>

        <!-- Social Media -->
        <div class="mt-6">
          <h5 class="text-white font-semibold mb-3">Follow Us</h5>
          <div class="flex gap-3">
            <!-- Facebook -->
            <a href="<?php echo $facebook; ?>"
              class="bg-gray-800 p-3 rounded-lg transition-all duration-300 transform hover:scale-110 border-2 border-transparent hover:border-orange-500">
              <i class="text-white fa-brands fa-facebook-f"></i>
            </a>

            <!-- Instagram -->
            <a href="<?php echo $instagram; ?>"
              class="bg-gray-800 p-3 rounded-lg transition-all duration-300 transform hover:scale-110 border-2 border-transparent hover:border-orange-500">
              <i class="text-white fa-brands fa-instagram"></i>
            </a>

            <!-- LinkedIn -->
            <a href="<?php echo $linkedin; ?>"
              class="bg-gray-800 p-3 rounded-lg transition-all duration-300 transform hover:scale-110 border-2 border-transparent hover:border-orange-500">
              <i class="text-white fa-brands fa-linkedin-in"></i>
            </a>

            <!-- Twitter/X -->
            <a href="<?php echo $x; ?>"
              class="bg-gray-800 p-3 rounded-lg transition-all duration-300 transform hover:scale-110 border-2 border-transparent hover:border-orange-500">
              <i class="text-white fa-brands fa-x-twitter"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- SEO Text Section -->
    <div class="mt-12 pt-8 border-t border-gray-700">
      <div class="bg-gray-800 rounded-lg p-6">
        <h5 class="text-orange-400 font-semibold mb-4 text-center">Our Taxi Services Across Rajasthan</h5>

        <!-- Primary SEO Keywords -->
        <div class="text-center mb-4">
          <div class="flex flex-wrap justify-center gap-2 mb-3">
            <?php
            $primaryKeywords = [
              'Taxi Services',
              'Rental Car',
              'Cab Booking Services Jaipur',
              'Car Taxi Rent in Jaipur',
              'Luxury Car Rental',
              'Airport Pickup & Drop',
              'Yash Sharma famous tours india',
              'Car booking Services',
              'Car on Rent',
              'Book Taxi',
              'Airport service'
            ];
            foreach ($primaryKeywords as $keyword): ?>
              <span class="bg-gray-700 text-gray-300 px-3 py-1 rounded-full text-sm"><?php echo $keyword; ?></span>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Route Specific Keywords -->
        <div class="text-center">
          <div class="flex flex-wrap justify-center gap-2">
            <?php
            $routeKeywords = [
              'Jaipur to Khatu Shyam Taxi',
              'Jaipur to Ajmer cab',
              'Jaipur to Jodhpur taxi',
              'Jaipur to Udaipur cab',
              'Jaipur to Delhi taxi',
              'Jaipur to Agra cab',
              'Local Sightseeing Taxi',
              'Outstation Taxi Service',
              '24 hours car rental'
            ];
            foreach ($routeKeywords as $keyword): ?>
              <span class="bg-gray-700 text-orange-300 px-3 py-1 rounded-full text-sm"><?php echo $keyword; ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="mt-8 pt-6 border-t border-gray-700">
      <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="text-center md:text-left">
          <p class="text-gray-400 text-sm">
            &copy; <?php echo date('Y'); ?> Famous Tours India. All rights reserved.
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Floating Action Buttons -->
<div class="fixed bottom-6 right-6 z-50 flex flex-col gap-4">
  <!-- WhatsApp Button -->
  <a href="https://wa.me/<?php echo $phone; ?>?text=Hello%20Famous%20Tours%20India%2C%20I%20want%20to%20book%20a%20taxi%20service."
    target="_blank"
    class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110 group">
    <i class="fab fa-whatsapp text-xl"></i>
    <span class="absolute right-12 top-1/2 transform -translate-y-1/2 bg-gray-900 text-white px-3 py-1 rounded-lg text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
      Chat on WhatsApp
    </span>
  </a>

  <!-- Call Button -->
  <a href="tel:<?php echo $phone; ?>"
    class="bg-orange-500 hover:bg-orange-600 text-white p-4 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110 group">
    <i class="fas fa-phone text-xl"></i>
    <span class="absolute right-12 top-1/2 transform -translate-y-1/2 bg-gray-900 text-white px-3 py-1 rounded-lg text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
      Call Now
    </span>
  </a>
</div>
