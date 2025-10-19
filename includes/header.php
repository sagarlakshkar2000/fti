<?php
$current_page = basename($_SERVER['PHP_SELF']);
$nav_items = [
  'Home' => 'index.php',
  'Tours' => 'tours.php',
  'About' => 'about.php',
  'Contact' => 'contact.php'
];
?>
<header class="bg-white shadow-sm sticky top-0 z-50">
  <nav class="container mx-auto px-4 py-4">
    <div class="flex justify-between items-center">
      <!-- Logo -->
      <a href="index.php" class="text-2xl font-bold text-blue-600">FTI Travel</a>

      <!-- Desktop Navigation -->
      <div class="hidden md:flex space-x-8">
        <?php foreach ($nav_items as $label => $url): ?>
          <a href="<?= $url ?>"
            class="font-medium transition duration-300 <?= $current_page === $url ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600' ?>">
            <?= $label ?>
          </a>
        <?php endforeach; ?>
      </div>

      <!-- Mobile menu button -->
      <div class="md:hidden">
        <button id="mobile-menu-button" class="text-gray-700">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2">
      <?php foreach ($nav_items as $label => $url): ?>
        <a href="<?= $url ?>"
          class="block py-2 px-4 rounded transition duration-300 <?= $current_page === $url ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50' ?>">
          <?= $label ?>
        </a>
      <?php endforeach; ?>
    </div>
  </nav>
</header>

<script>
  document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  });
</script>
