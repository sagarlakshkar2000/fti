<?php
$custom_css = '

<style>
  /* Smooth hover transitions */
  .group:hover .group-hover\:scale-105 {
    transform: scale(1.05);
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .grid-cols-1 {
      grid-template-columns: 1fr;
    }

    .grid-cols-2 {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 640px) {
    .grid-cols-2 {
      grid-template-columns: 1fr;
    }
  }
</style>

';
?>

<section class="md:px-4 py-16 bg-gradient-to-br from-amber-50 to-orange-50">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
        Explore <span class="text-orange-600">Rajasthan Tours</span>
      </h2>
      <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
        Discover the land of kings with our curated tour packages
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
      <?php foreach ($tourPackages as $pkg): ?>
        <div class="group">
          <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 h-full flex flex-col ring-2 ring-orange-500 md:ring-transparent md:hover:ring-orange-500 md:hover:scale-105">

            <div class="bg-gradient-to-r from-orange-500 to-amber-500 p-6 relative">
              <?php if ($pkg['is_popular']): ?>
                <div class="absolute top-30 -right-2">
                  <span class="bg-orange-500 text-white px-3 py-1 rounded-l-full text-sm font-bold shadow-lg">
                    Most Popular
                  </span>
                </div>
              <?php endif; ?>

              <div class="flex justify-between items-start">
                <h3 class="text-xl font-bold text-white pr-4"><?php echo $pkg['name']; ?></h3>
                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-1 min-w-20">
                  <span class="text-white font-medium md:font-semibold text-xs md:text-sm"><?php echo $pkg['duration']; ?></span>
                </div>
              </div>
            </div>

            <div class="p-6 flex-grow flex flex-col">
              <div class="space-y-3 mb-6 flex-grow">
                <?php if (!empty($pkg['route'])): ?>
                  <div class="flex items-center gap-3">
                    <div class="bg-orange-100 text-orange-600 p-2 rounded-lg">
                      <i class="fas fa-map-marker-alt text-sm"></i>
                    </div>
                    <span class="text-gray-700 text-sm font-medium"><?php echo $pkg['route']; ?></span>
                  </div>
                <?php endif; ?>

                <?php if (!empty($pkg['accommodation'])): ?>
                  <div class="flex items-center gap-3">
                    <div class="bg-orange-100 text-orange-600 p-2 rounded-lg">
                      <i class="fas fa-hotel text-sm"></i>
                    </div>
                    <span class="text-gray-700 text-sm font-medium"><?php echo $pkg['accommodation']; ?></span>
                  </div>
                <?php endif; ?>

                <?php if (!empty($pkg['transport'])): ?>
                  <div class="flex items-center gap-3">
                    <div class="bg-orange-100 text-orange-600 p-2 rounded-lg">
                      <i class="fas fa-car text-sm"></i>
                    </div>
                    <span class="text-gray-700 text-sm font-medium"><?php echo $pkg['transport']; ?></span>
                  </div>
                <?php endif; ?>
              </div>

              <?php if (!empty($pkg['catch_line'])): ?>
                <div class="mb-6">
                  <p class="text-gray-600 text-sm leading-relaxed italic border-l-4 border-orange-500 pl-3 py-1">
                    "<?php echo $pkg['catch_line']; ?>"
                  </p>
                </div>
              <?php endif; ?>

              <a href="tel:<?php echo $phone; ?>"
                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center justify-center gap-2 text-center">
                <i class="fas fa-phone-alt"></i>
                Enquire Now
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-12">
      <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 max-w-4xl mx-auto">
        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
          Can't find your perfect tour?
        </h3>
        <p class="text-gray-600 mb-6 text-lg">
          We customize tours according to your preferences and budget
        </p>
        <a href="tel:<?php echo $phone; ?>"
          class="bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg inline-flex items-center gap-3 text-lg">
          <i class="fas fa-calendar-check"></i>
          Customize Your Tour
        </a>
      </div>
    </div>
  </div>
</section>
