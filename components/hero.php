<?php
// Hero section data
$heroSlides = [
  [
    'id' => 1,
    'title_part1' => 'Jaipur to Khatu Shyam Ji & Salasar Balaji',
    'title_part2' => 'Taxi Services',
    'description' => 'Travel hassle-free to the most sacred temples of Rajasthan with <strong>Famous Tours India</strong>. Trusted by <span class="text-yellow-300">10,000+ devotees</span>, we provide safe, affordable, and professional taxi services from Jaipur to <strong>Khatu Shyam Ji</strong> and <strong>Salasar Balaji</strong>.',
    'rating' => 4.9,
    'reviews_count' => '10K+',
    'features' => [
      ['icon' => 'calendar-check', 'text' => 'Instant Booking'],
      ['icon' => 'car', 'text' => 'Comfortable Vehicles'],
      ['icon' => 'phone-volume', 'text' => '24x7 Helpline']
    ],
    'cta_text' => 'Call for Booking Taxi',
    'image' => './public/assets/images/kia-carens-fti.png'
  ],
  [
    'id' => 2,
    'title_part1' => 'Golden Triangle Tour',
    'title_part2' => 'Delhi – Agra – Jaipur',
    'description' => 'Explore India\'s most iconic destinations with <strong>Famous Tours India</strong>. From the <span class="text-yellow-300">Taj Mahal</span> in Agra to the forts of Jaipur and the charm of Delhi, our <strong>Golden Triangle Taxi Package</strong> ensures a safe, guided, and memorable journey.',
    'rating' => 4.8,
    'reviews_count' => '8K+',
    'features' => [
      ['icon' => 'landmark', 'text' => 'Historic Sites'],
      ['icon' => 'car-side', 'text' => 'Luxury & Budget Options'],
      ['icon' => 'clock', 'text' => 'Flexible Schedules']
    ],
    'cta_text' => 'Call for Booking Taxi',
    'image' => './public/assets/images/maruti-ertiga-2-fti.png'
  ],
  [
    'id' => 3,
    'title_part1' => 'Rajasthan Tours',
    'title_part2' => 'Udaipur – Jodhpur – Jaisalmer',
    'description' => 'Discover the royal heritage of Rajasthan with <strong>Famous Tours India</strong>. From the <span class="text-yellow-300">City of Lakes Udaipur</span> to the <strong>Golden Desert of Jaisalmer</strong>, our tours offer cultural experiences, desert safaris, and unforgettable hospitality.',
    'rating' => 5.0,
    'reviews_count' => '12K+',
    'features' => [
      ['icon' => 'umbrella-beach', 'text' => 'Desert Safaris'],
      ['icon' => 'hotel', 'text' => 'Comfortable Stays'],
      ['icon' => 'user-tie', 'text' => 'Professional Guides']
    ],
    'cta_text' => 'Call for Booking Taxi',
    'image' => './public/assets/images/innova-1-fti.png'
  ]
];
?>

<!-- Hero Section Start -->
<section class="min-h-dvh flex items-center bg-gradient-to-br from-orange-700 via-orange-600 to-amber-500 relative overflow-hidden">
  <!-- Background Pattern -->
  <div class="absolute inset-0 bg-black/10 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-transparent via-black/5 to-black/10"></div>

  <div class="container mx-auto px-4 sm:px-6 py-12 md:py-16 lg:py-20 relative z-10">
    <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12 xl:gap-16">

      <!-- Left Content - Text Carousel -->
      <div class="w-full lg:w-1/2 text-white flex flex-col justify-center">
        <div id="heroTextCarousel" class="relative">
          <?php foreach ($heroSlides as $index => $slide): ?>
            <div class="carousel-slide absolute inset-0 transition-all duration-500 ease-in-out <?php echo $index === 0 ? 'active opacity-100' : 'opacity-0'; ?>" data-slide="<?php echo $slide['id']; ?>">

              <!-- Badge -->
              <div class="inline-flex items-center bg-yellow-400 text-gray-900 px-4 py-2 rounded-full text-sm font-bold mb-6 lg:mb-8 animate-fade-in">
                <span class="mr-2">🚗</span>
                Trusted Taxi Service
              </div>

              <!-- Title -->
              <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold leading-tight mb-6 lg:mb-8">
                <span class="text-yellow-300 block"><?php echo $slide['title_part1']; ?></span>
                <span class="text-white block"><?php echo $slide['title_part2']; ?></span>
              </h1>

              <!-- Description -->
              <div class="text-lg sm:text-xl text-gray-100 mb-6 lg:mb-8 leading-relaxed max-w-2xl">
                <?php echo $slide['description']; ?>
              </div>

              <!-- Rating -->
              <div class="flex items-center gap-3 mb-6 lg:mb-8">
                <div class="flex text-yellow-300 text-lg">
                  <?php
                  $fullStars = floor($slide['rating']);
                  $hasHalfStar = ($slide['rating'] - $fullStars) > 0;

                  for ($i = 0; $i < $fullStars; $i++): ?>
                    <i class="fas fa-star"></i>
                  <?php endfor; ?>

                  <?php if ($hasHalfStar): ?>
                    <i class="fas fa-star-half-alt"></i>
                  <?php endif; ?>
                </div>
                <span class="font-semibold text-white">
                  <?php echo $slide['rating']; ?> (<?php echo $slide['reviews_count']; ?> Happy Travellers)
                </span>
              </div>

              <!-- Features -->
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 mb-8 lg:mb-10">
                <?php foreach ($slide['features'] as $feature): ?>
                  <div class="flex items-center gap-3 bg-white/10 rounded-lg p-3 backdrop-blur-sm border border-white/10 transition-all duration-300 hover:bg-white/15">
                    <i class="fas fa-<?php echo $feature['icon']; ?> text-yellow-300 text-lg"></i>
                    <span class="font-medium text-white text-sm sm:text-base"><?php echo $feature['text']; ?></span>
                  </div>
                <?php endforeach; ?>
              </div>

              <!-- CTA Button -->
              <a href="tel:<?php echo $phone; ?>" class="inline-flex items-center justify-center gap-3 bg-yellow-400 text-gray-900 px-6 sm:px-8 py-3 sm:py-4 rounded-lg font-bold text-lg hover:bg-yellow-300 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 active:translate-y-0 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-offset-2 focus:ring-offset-orange-600">
                <i class="fas fa-phone"></i>
                <?php echo $slide['cta_text']; ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Carousel Indicators -->
        <div class="flex gap-2 mt-8 lg:mt-10">
          <?php foreach ($heroSlides as $index => $slide): ?>
            <button class="carousel-indicator w-3 h-3 rounded-full transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-orange-600 <?php echo $index === 0 ? 'bg-yellow-400 scale-110' : 'bg-white/50'; ?>"
              data-slide-to="<?php echo $index; ?>"
              aria-label="Go to slide <?php echo $index + 1; ?>"></button>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Right Car Images -->
      <div class="w-full lg:w-1/2 relative flex justify-center">
        <div id="heroImageCarousel" class="relative w-full max-w-lg lg:max-w-none rounded-2xl overflow-hidden shadow-2xl">
          <?php foreach ($heroSlides as $index => $slide): ?>
            <div class="carousel-slide transition-all duration-500 ease-in-out <?php echo $index === 0 ? 'active opacity-100' : 'opacity-0'; ?>" data-slide="<?php echo $slide['id']; ?>">
              <img src="<?php echo $slide['image']; ?>"
                alt="<?php echo $slide['title_part1']; ?>"
                class="w-full h-auto rounded-2xl shadow-none object-contain">
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Carousel Controls -->
        <div class="absolute -bottom-6 sm:bottom-4 right-4 flex gap-2">
          <button class="carousel-prev bg-white/20 text-white p-3 rounded-full backdrop-blur-sm hover:bg-white/30 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-orange-600" aria-label="Previous slide">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button class="carousel-next bg-white/20 text-white p-3 rounded-full backdrop-blur-sm hover:bg-white/30 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-orange-600" aria-label="Next slide">
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>

        <!-- Floating Badge -->
        <div class="absolute -top-4 -left-4 bg-gradient-to-r from-orange-600 to-amber-500 text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg shadow-lg">
          <div class="flex items-center gap-2 text-sm sm:text-base">
            <i class="fas fa-shield-alt"></i>
            <span class="font-bold">Safe & Secure</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Hero Section -->

<style>
  .carousel-slide {
    opacity: 0;
    transform: translateX(20px);
    transition: all 0.5s ease-in-out;
    pointer-events: none;
  }

  .carousel-slide.active {
    opacity: 1;
    transform: translateX(0);
    pointer-events: all;
  }

  /* Smooth animations for slide content */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  .animate-fade-in {
    animation: fadeIn 0.6s ease-out;
  }

  .carousel-slide.active>* {
    animation: fadeInUp 0.6s ease-out;
  }

  .carousel-slide.active>*:nth-child(1) {
    animation-delay: 0.1s;
  }

  .carousel-slide.active>*:nth-child(2) {
    animation-delay: 0.2s;
  }

  .carousel-slide.active>*:nth-child(3) {
    animation-delay: 0.3s;
  }

  .carousel-slide.active>*:nth-child(4) {
    animation-delay: 0.4s;
  }

  .carousel-slide.active>*:nth-child(5) {
    animation-delay: 0.5s;
  }

  .carousel-slide.active>*:nth-child(6) {
    animation-delay: 0.6s;
  }
</style>

<script>
  // Custom Carousel Functionality
  class HeroCarousel {
    constructor() {
      this.currentSlide = 0;
      this.textSlides = document.querySelectorAll('#heroTextCarousel .carousel-slide');
      this.imageSlides = document.querySelectorAll('#heroImageCarousel .carousel-slide');
      this.indicators = document.querySelectorAll('.carousel-indicator');
      this.totalSlides = this.textSlides.length;
      this.autoPlayInterval = null;
      this.isTransitioning = false;

      this.init();
    }

    init() {
      // Add event listeners
      document.querySelector('.carousel-prev')?.addEventListener('click', () => this.prev());
      document.querySelector('.carousel-next')?.addEventListener('click', () => this.next());

      // Indicator clicks
      this.indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => this.goToSlide(index));
      });

      // Keyboard navigation
      document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') this.prev();
        if (e.key === 'ArrowRight') this.next();
      });

      // Auto-play
      this.startAutoPlay();

      // Pause on hover
      const carouselContainer = document.getElementById('heroTextCarousel');
      if (carouselContainer) {
        carouselContainer.addEventListener('mouseenter', () => this.stopAutoPlay());
        carouselContainer.addEventListener('mouseleave', () => this.startAutoPlay());
      }
    }

    showSlide(index) {
      if (this.isTransitioning || index === this.currentSlide) return;

      this.isTransitioning = true;

      // Hide all slides
      this.textSlides.forEach(slide => {
        slide.classList.remove('active');
        slide.classList.add('opacity-0');
      });

      this.imageSlides.forEach(slide => {
        slide.classList.remove('active');
        slide.classList.add('opacity-0');
      });

      // Show current slide
      setTimeout(() => {
        this.textSlides[index].classList.add('active');
        this.textSlides[index].classList.remove('opacity-0');

        this.imageSlides[index].classList.add('active');
        this.imageSlides[index].classList.remove('opacity-0');

        // Update indicators
        this.indicators.forEach((indicator, i) => {
          if (i === index) {
            indicator.classList.add('bg-yellow-400', 'scale-110');
            indicator.classList.remove('bg-white/50');
          } else {
            indicator.classList.remove('bg-yellow-400', 'scale-110');
            indicator.classList.add('bg-white/50');
          }
        });

        this.currentSlide = index;
        this.isTransitioning = false;
      }, 50);
    }

    next() {
      const nextSlide = (this.currentSlide + 1) % this.totalSlides;
      this.showSlide(nextSlide);
    }

    prev() {
      const prevSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
      this.showSlide(prevSlide);
    }

    goToSlide(index) {
      this.showSlide(index);
    }

    startAutoPlay() {
      this.stopAutoPlay();
      this.autoPlayInterval = setInterval(() => this.next(), 5000);
    }

    stopAutoPlay() {
      if (this.autoPlayInterval) {
        clearInterval(this.autoPlayInterval);
        this.autoPlayInterval = null;
      }
    }
  }

  // Initialize carousel when DOM is loaded
  document.addEventListener('DOMContentLoaded', () => {
    new HeroCarousel();
  });
</script>
