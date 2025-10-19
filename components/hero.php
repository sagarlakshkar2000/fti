<?php
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

<?php
$custom_css = '
<style>
  .carousel-slide {
    opacity: 0;
    transform: translateX(20px);
    pointer-events: none;
  }

  .carousel-slide.active {
    opacity: 1;
    transform: translateX(0);
    pointer-events: all;
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
    animation: fadeIn 0.6s ease-in;
  }
</style>
';
?>

<!-- ✅ Hero Section Start -->
<section class="relative flex items-center overflow-hidden bg-gradient-to-br from-orange-700 via-orange-600 to-amber-500">
  <!-- Decorative Pattern -->
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(255,255,255,0.08),transparent_60%)]"></div>

  <div class="relative z-10 container mx-auto px-4 md:px-6 lg:px-10 py-16 flex flex-col lg:flex-row items-center gap-10">

    <!-- ✅ Left Content -->
    <div class="relative w-full lg:w-1/2 text-white">
      <div id="heroTextCarousel" class="relative min-h-[470px]">
        <?php foreach ($heroSlides as $index => $slide): ?>
          <div class="carousel-slide absolute inset-0 transition-all duration-700 ease-in-out <?php echo $index === 0 ? 'active opacity-100 translate-x-0' : 'opacity-0 translate-x-10'; ?>">

            <!-- Title -->
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mb-4">
              <span class="inline text-yellow-300"><?php echo $slide['title_part1']; ?></span>
              <span class="inline text-white"><?php echo $slide['title_part2']; ?></span>
            </h1>

            <!-- Description -->
            <p class="text-lg sm:text-md text-gray-100 mb-6 leading-relaxed max-w-xl"><?php echo $slide['description']; ?></p>

            <!-- Rating -->
            <div class="flex items-center gap-2 mb-5">
              <div class="text-yellow-300">
                <?php
                $fullStars = floor($slide['rating']);
                $hasHalfStar = ($slide['rating'] - $fullStars) > 0;
                for ($i = 0; $i < $fullStars; $i++): ?><i class="fas fa-star"></i><?php endfor;
                                                                                if ($hasHalfStar): ?><i class="fas fa-star-half-alt"></i><?php endif; ?>
              </div>
              <span class="text-white font-medium"><?php echo $slide['rating']; ?> (<?php echo $slide['reviews_count']; ?>+ travellers)</span>
            </div>

            <!-- Features -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-8">
              <?php foreach ($slide['features'] as $feature): ?>
                <div class="flex items-center gap-3 bg-white/10 hover:bg-white/20 transition rounded-lg p-3 backdrop-blur-sm">
                  <i class="fas fa-<?php echo $feature['icon']; ?> text-yellow-300"></i>
                  <span class="text-sm font-medium"><?php echo $feature['text']; ?></span>
                </div>
              <?php endforeach; ?>
            </div>

            <!-- CTA -->
            <a href="tel:+919000000000"
              class="inline-flex items-center gap-3 bg-yellow-400 text-gray-900 px-8 py-3 rounded-lg text-lg font-bold hover:bg-yellow-300 transition transform hover:-translate-y-1 shadow-lg">
              <i class="fas fa-phone"></i> <?php echo $slide['cta_text']; ?>
            </a>
          </div>
        <?php endforeach; ?>
      </div>


    </div>

    <!-- ✅ Right Image -->
    <div class="w-full lg:w-1/2 relative">
      <div id="heroImageCarousel" class="relative aspect-[4/3] w-full max-w-lg mx-auto">
        <?php foreach ($heroSlides as $index => $slide): ?>
          <div class="carousel-slide absolute inset-0 transition-all duration-700 ease-in-out <?php echo $index === 0 ? 'active opacity-100 translate-x-0' : 'opacity-0 translate-x-10'; ?>">
            <img src="<?php echo $slide['image']; ?>" alt="<?php echo $slide['title_part1']; ?>" class="w-full h-full object-contain drop-shadow-2xl" />
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Controls -->
      <div class="absolute bottom-4 right-4 flex gap-3">
        <button class="carousel-prev bg-white/20 hover:bg-white/30 text-white p-3 rounded-full backdrop-blur-md"><i class="fas fa-chevron-left"></i></button>
        <button class="carousel-next bg-white/20 hover:bg-white/30 text-white p-3 rounded-full backdrop-blur-md"><i class="fas fa-chevron-right"></i></button>
      </div>
    </div>
  </div>
</section>

<!-- ✅ Carousel Script -->
<?php
$head_scripts = <<<EOD
<script>
  class HeroCarousel {
    constructor() {
      this.current = 0;
      this.textSlides = document.querySelectorAll('#heroTextCarousel .carousel-slide');
      this.imageSlides = document.querySelectorAll('#heroImageCarousel .carousel-slide');
      this.indicators = document.querySelectorAll('.carousel-indicator');
      this.total = this.textSlides.length;
      this.autoPlay = null;
      this.bindEvents();
      this.start();
    }

    bindEvents() {
      document.querySelector('.carousel-prev').addEventListener('click', () => this.prev());
      document.querySelector('.carousel-next').addEventListener('click', () => this.next());
      this.indicators.forEach((btn, i) => btn.addEventListener('click', () => this.show(i)));
    }

    show(i) {
      this.textSlides.forEach(s => s.classList.remove('active', 'opacity-100', 'translate-x-0'));
      this.imageSlides.forEach(s => s.classList.remove('active', 'opacity-100', 'translate-x-0'));
      this.indicators.forEach((btn, idx) =>
        btn.classList.toggle('bg-yellow-400', idx === i)
      );
      this.textSlides[i].classList.add('active', 'opacity-100', 'translate-x-0');
      this.imageSlides[i].classList.add('active', 'opacity-100', 'translate-x-0');
      this.current = i;
    }

    next() {
      this.show((this.current + 1) % this.total);
    }

    prev() {
      this.show((this.current - 1 + this.total) % this.total);
    }

    start() {
      this.autoPlay = setInterval(() => this.next(), 6000);
    }
  }

  document.addEventListener('DOMContentLoaded', () => new HeroCarousel());
</script>
EOD;
?>
