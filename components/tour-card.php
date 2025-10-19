<?php
// Tour card component
// Usage: include __DIR__ . '/components/tour-card.php';
?>
<div class="bg-white rounded-lg shadow-lg overflow-hidden smooth-transition hover:shadow-xl">
  <img src="/assets/images/tours/<?= $tour['image'] ?>" alt="<?= $tour['title'] ?>" class="w-full h-48 object-cover">
  <div class="p-6">
    <h3 class="text-xl font-bold mb-2 text-gray-800"><?= $tour['title'] ?></h3>
    <p class="text-gray-600 mb-4 text-sm"><?= $tour['description'] ?? '' ?></p>
    <div class="flex justify-between items-center mb-4">
      <span class="text-2xl font-bold text-green-600"><?= $tour['price'] ?></span>
      <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium"><?= $tour['days'] ?></span>
    </div>
    <a href="tour-details.php?id=<?= $tour['id'] ?>" class="block w-full bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 smooth-transition">
      View Details
    </a>
  </div>
</div>
