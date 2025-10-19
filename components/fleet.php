<?php
// Section data
$jsonData = file_get_contents('./utils/data/cars.json');
$jsonDecodedData = json_decode($jsonData, true);
$title = $jsonDecodedData['cars_section']['title'];
$description = $jsonDecodedData['cars_section']['description'];
$tours = $jsonDecodedData['cars_section']['cars'];

// Custom CSS
ob_start();
?>
<style>
  /* Travel-themed styles */
  .travel-fleet-section {
    font-family: 'Inter', system-ui, sans-serif;
    background: linear-gradient(to bottom, #e0f2fe, #f8fafc);
    position: relative;
    overflow: hidden;
  }

  .car-card {
    background: white;
    border-radius: 0.75rem;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .car-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
  }

  .car-image-container {
    position: relative;
    height: 230px;
  }

  .car-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .car-card:hover .car-image {
    transform: scale(1.03);
  }

  .car-content {
    padding: 1rem;
  }

  .car-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #1e3a8a;
    margin-bottom: 0.5rem;
  }

  .car-capacity {
    font-size: 0.9rem;
    color: #64748b;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .book-now-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: #3b82f6;
    color: white;
    border-radius: 0.5rem;
    font-weight: 500;
    font-size: 0.9rem;
    transition: background 0.3s ease;
  }

  .book-now-btn:hover {
    background: #1e40af;
  }

  /* Responsive adjustments */
  @media (max-width: 640px) {
    .car-card {
      margin-bottom: 1rem;
    }

    .car-image-container {
      height: 150px;
    }

    .car-title {
      font-size: 1.1rem;
    }

    .car-capacity {
      font-size: 0.85rem;
    }
  }
</style>
<?php
$custom_css = ob_get_clean();

// Additional meta tags
$additional_meta = [
  '<meta name="robots" content="index, follow">',
  '<meta name="author" content="Your Travel Company">',
  '<link rel="preconnect" href="https://fonts.googleapis.com">',
  '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>'
];

// Page Content
ob_start();
?>
<!-- Start Travel Fleet Section -->
<section class="travel-fleet-section py-12 md:py-16 relative">
  <!-- Background Pattern -->
  <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml;utf8,<svg width=\" 60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\">
    <path fill=\"%23bfdbfe\" d=\"M30 0L32 28L60 30L32 32L30 60L28 32L0 30L28 28z\" /></svg>')]">
  </div>

  <div class="container mx-auto px-4 sm:px-6 relative z-10">
    <!-- Section Header -->
    <div class="text-center mb-10 max-w-3xl mx-auto">
      <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-600 rounded-full px-4 py-2 mb-4">
        <i class="fa-solid fa-car text-sm"></i>
        <span class="text-sm font-medium">Travel in Style</span>
      </div>
      <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4"><?= $title; ?></h2>
      <p class="text-lg text-slate-600 leading-relaxed"><?= $description; ?></p>
    </div>

    <!-- Fleet Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($tours as $tour): ?>
        <div class="car-card">
          <!-- Image Container -->
          <div class="car-image-container">
            <img src="<?= $tour['image']; ?>" alt="<?= $tour['name']; ?>" class="car-image">
          </div>

          <!-- Card Content -->
          <div class="car-content">
            <h3 class="car-title"><?= $tour['name']; ?></h3>
            <div class="car-capacity">
              <i class="fa-solid fa-user-group text-sm text-blue-600"></i>
              <span><?= $tour['specifications']['seating_capacity']; ?> Seats</span>
            </div>
            <a href="<?= $tour['whatsapp_link']; ?>" target="_blank" class="book-now-btn">
              <i class="fa-brands fa-whatsapp"></i> Book Now
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- End Travel Fleet Section -->
<?php
$page_content = ob_get_clean();
echo $custom_css . implode("\n", $additional_meta) . $page_content;
?>
