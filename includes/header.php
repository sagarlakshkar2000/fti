<?php
$current_page = basename($_SERVER['PHP_SELF']);
include './utils/info.php';
$nav_items = [
  'Home' => 'index.php',
  'About' => 'about.php',
  'Contact' => 'contact.php'
];
?>
<header class="bg-white shadow-md sticky top-0 z-50">
  <div class="container mx-auto">
    <!-- Top Bar with Ratings -->
    <div class="bg-black hidden md:flex justify-between items-center px-2 md:pl-4 md:pr-12 py-2 border-b border-gray-200">
      <div class="flex items-center space-x-6 text-sm text-white ">
        <!-- Google Rating -->
        <div class="flex items-center space-x-2">
          <div class="flex items-center">
            <!-- Google SVG Icon -->
            <img src="./public/assets/images/icons/google.svg" alt="Google" class="w-5 h-5">
          </div>
          <div class="flex items-center space-x-1">
            <span class="text-yellow-400">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </span>
            <span class="text-white font-semibold">4.8+</span>
          </div>
        </div>

        <!-- TripAdvisor Rating -->
        <div class="flex items-center space-x-2">
          <div class="flex items-center">
            <!-- TripAdvisor SVG Icon -->
            <img src="./public/assets/images/icons/tripadvisor.svg" alt="TripAdvisor" class="w-full h-5">
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
          <a href="tel:<?= preg_replace('/\s+/', '', $phone) ?>"
            class="text-white hover:text-blue-400 transition-colors duration-200">
            <?= htmlspecialchars($phone) ?>
          </a>
        </div>
        <div class="flex items-center space-x-1">
          <i class="fas fa-envelope text-white"></i>
          <a href="mailto:<?= htmlspecialchars($email) ?>"
            class="text-white hover:text-blue-400 transition-colors duration-200">
            <?= htmlspecialchars($email) ?>
          </a>
        </div>
      </div>
    </div>

    <!-- Main Navigation -->
    <nav class="flex justify-between items-center px-2 md:pl-4 md:pr-12 py-4 relative">
      <!-- Logo -->
      <a href="index.php" class="flex items-center space-x-3">
        <div class="absolute top-2 md:top-1 md:left-5 rounded-full overflow-hidden md:shadow-md">
          <!-- Taxi SVG Icon -->
          <img src="./public/assets/images/logo.jpg" alt="FTI Travel" class="w-full h-25 md:h-30 text-white">
        </div>
        <div class="hidden md:block md:pl-35 ">
          <h3 class="md:text-2xl font-bold text-black uppercase">Famous Tours India</h3>
        </div>
      </a>

      <!-- Desktop Navigation -->
      <div class="hidden lg:flex items-center space-x-8">
        <?php foreach ($nav_items as $label => $url): ?>
          <a href="<?= $url ?>"
            class="font-medium text-black hover:text-orange-600 transition duration-300
            <?= $current_page === $url ? 'text-orange-600 border-b border-orange-600' : '' ?>">
            <?= $label ?>
          </a>
        <?php endforeach; ?>

        <!-- Book Now Button -->
        <a href="contact.php" class="bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-700 transition duration-300 font-medium">
          Book Now
        </a>
      </div>

      <!-- Mobile menu button -->
      <div class="lg:hidden flex items-center space-x-4">
        <a href="contact.php" class="bg-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-orange-700">
          Book Now
        </a>
        <button id="mobile-menu-button" class="text-black p-2 rounded-lg hover:bg-gray-100">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </nav>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden lg:hidden pb-4 border-t border-gray-200">
      <!-- Mobile Ratings -->
      <div class="pt-10 pb-4 border-b border-gray-200">
        <div class="flex justify-around">
          <!-- Google Rating Mobile -->
          <div class="text-center">
            <div class="flex items-center justify-center space-x-1 mb-1">
              <img src="./public/assets/images/icons/google.svg" alt="Google" class="w-8 h-8">
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
            <div class="flex items-center justify-center space-x-1 mb-1">
              <img src="./public/assets/images/icons/tripadvisor.svg" alt="TripAdvisor" class="w-full h-8">
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
      <div class="py-4 space-y-3">
        <?php foreach ($nav_items as $label => $url): ?>
          <a href="<?= $url ?>"
            class="block py-3 px-4 rounded-lg transition duration-300 text-black font-medium
            <?= $current_page === $url ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50' ?>">
            <?= $label ?>
          </a>
        <?php endforeach; ?>
      </div>

      <!-- Mobile Contact Info -->
      <div class="mt-4 p-4 bg-gray-50 rounded-lg">
        <h3 class="font-semibold text-black mb-3">Contact Us</h3>
        <div class="space-y-2 text-sm">
          <div class="flex items-center space-x-3">
            <i class="fas fa-phone text-blue-600"></i>
            <span class="text-black">+91 98765 43210</span>
          </div>
          <div class="flex items-center space-x-3">
            <i class="fas fa-envelope text-blue-600"></i>
            <span class="text-black">info@ftitravel.com</span>
          </div>
          <div class="flex items-center space-x-3">
            <i class="fas fa-map-marker-alt text-blue-600"></i>
            <span class="text-black">Delhi, India</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<script>
  document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');

    // Toggle icon between menu and close
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
      document.getElementById('mobile-menu').classList.add('hidden');
      document.getElementById('mobile-menu-button').querySelector('svg').innerHTML =
        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
    });
  });
</script>
