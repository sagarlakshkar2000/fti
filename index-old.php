<?php
include('utils/info.php');

// Page specific SEO
$page_title = "FTI Travel | Explore Best Travel Packages";
$page_description = "Book your dream travel package with FTI Travel. Affordable trips, luxury vacations, and adventure tours worldwide.";
$page_keywords = "travel, tour packages, holidays, vacations, FTI Travel";
$page_canonical = "https://www.ftitravel.com/";

// Page content
ob_start(); ?>
<?php
// Read JSON file
$jsonData = file_get_contents('data/cars.json');
$jsonDecodedData = json_decode($jsonData, true);
$taxiServices = $jsonDecodedData['cars_section']['taxi_services'];
$tourPackages = $jsonDecodedData['cars_section']['tourPackages'];

?>



<!-- Hero Section Start -->
<section class="hero-section">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Content -->
      <div class="col-lg-6 hero-content">
        <div id="heroTextCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
          <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
              <h1>
                <span class="highlight">Jaipur to Khatu Shyam Ji & Salasar Balaji</span> Taxi Services
              </h1>
              <p>
                Travel hassle-free to the most sacred temples of Rajasthan with <strong>Famous Tours
                  India</strong>.
                Trusted by <span class="highlight">10,000+ devotees</span>, we provide safe, affordable,
                and professional
                taxi services from Jaipur to <strong>Khatu Shyam Ji</strong> and <strong>Salasar
                  Balaji</strong>.
              </p>

              <!-- Rating -->
              <div class="reviews">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                <span> 4.9 (10K+ Happy Travellers)</span>
              </div>

              <!-- Features -->
              <div class="features">
                <div><i class="fas fa-calendar-check"></i> Instant Booking</div>
                <div><i class="fas fa-car"></i> Comfortable Vehicles</div>
                <div><i class="fas fa-phone-volume"></i> 24x7 Helpline</div>
              </div>

              <!-- CTA Button -->
              <a href="tel:<?php echo $phone; ?>" class="btn btn-cta">Call for Booking Taxi</a>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
              <h1>
                <span class="highlight">Golden Triangle Tour</span> Delhi – Agra – Jaipur
              </h1>
              <p>
                Explore India’s most iconic destinations with <strong>Famous Tours India</strong>.
                From the <span class="highlight">Taj Mahal</span> in Agra to the forts of Jaipur and the
                charm of Delhi,
                our <strong>Golden Triangle Taxi Package</strong> ensures a safe, guided, and memorable
                journey.
              </p>

              <!-- Rating -->
              <div class="reviews">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                <i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                <span> 4.8 (8K+ Happy Travellers)</span>
              </div>

              <!-- Features -->
              <div class="features">
                <div><i class="fas fa-landmark"></i> Historic Sites</div>
                <div><i class="fas fa-car-side"></i> Luxury & Budget Options</div>
                <div><i class="fas fa-clock"></i> Flexible Schedules</div>
              </div>

              <!-- CTA Button -->
              <a href="tel:<?php echo $phone; ?>" class="btn btn-cta">Call for Booking Taxi</a>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
              <h1>
                <span class="highlight">Rajasthan Tours</span> Udaipur – Jodhpur – Jaisalmer
              </h1>
              <p>
                Discover the royal heritage of Rajasthan with <strong>Famous Tours India</strong>.
                From the <span class="highlight">City of Lakes Udaipur</span> to the <strong>Golden
                  Desert of Jaisalmer</strong>,
                our tours offer cultural experiences, desert safaris, and unforgettable hospitality.
              </p>

              <!-- Rating -->
              <div class="reviews">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                <span> 5.0 (12K+ Happy Travellers)</span>
              </div>

              <!-- Features -->
              <div class="features">
                <div><i class="fas fa-umbrella-beach"></i> Desert Safaris</div>
                <div><i class="fas fa-hotel"></i> Comfortable Stays</div>
                <div><i class="fas fa-user-tie"></i> Professional Guides</div>
              </div>

              <!-- CTA Button -->
              <a href="tel:<?php echo $phone; ?>" class="btn btn-cta">Call for Booking Taxi</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Car Images -->
      <div class="col-lg-6">
        <div id="heroImageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./assets/images/kia-carens-fti.png"
                alt="Kia Carens Taxi" class="d-block w-100 rounded-0 shadow-none">
            </div>
            <div class="carousel-item">
              <img src="./assets/images/maruti-ertiga-2-fti.png"
                alt="Maruti Ertiga Taxi" class="d-block w-100 rounded-0 shadow-none">
            </div>
            <div class="carousel-item">
              <img src="./assets/images/innova-1-fti.png"
                alt="Toyota Innova Taxi" class="d-block w-100 rounded-0 shadow-none">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Hero Section -->

<!-- Start Our Taxi Service Section -->
<section class="taxi-services container-fluid py-5 bg-white">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Our Taxi Services</h2>
      <p class="text-muted">Reliable and convenient rides for all your needs</p>
    </div>

    <div class="row g-4">
      <?php foreach ($taxiServices as $service): ?>
        <div class="col-6 col-lg-4">
          <div class="service-box h-100 p-4 text-center">
            <div class="icon-box mx-auto mb-3">
              <i class="fas fa-taxi"></i>
            </div>
            <h5 class="fw-bold mb-2"><?= htmlspecialchars($service['title']) ?></h5>
            <p class="text-muted small mb-0"><?= htmlspecialchars($service['description']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- End Our Taxi Service Section -->

<!-- Start Our Fleets Section -->
<div class="our-fleet-section container-fluid py-5">
  <div class="container">
    <div class="text-center mb-5">
      <?php

      // Section data
      $title = $jsonDecodedData['cars_section']['title'];
      $description = $jsonDecodedData['cars_section']['description'];
      $tours = $jsonDecodedData['cars_section']['cars'];
      ?>
      <h2 class="fw-bold"><?= $title; ?></h2>
      <p class="text-white"><?= $description; ?></p>
    </div>

    <div class="row rounded-3 overflow-hidden">
      <?php foreach ($tours as $tour): ?>
        <div class="col-6 col-md-4 px-0">
          <div class="fleet-card card p-3 shadow-none">
            <div class="position-relative">
              <img src="<?= $tour['image']; ?>" class="card-img-top" alt="<?= $tour['name']; ?>">
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold">
                <?= $tour['name']; ?>
              </h5>

              <!-- <p class="text-warning mb-1">
                                <?php for ($i = 0; $i <= floor($tour['rating']); $i++): ?>
                                    <i class="fas fa-star"></i>
                                <?php endfor; ?>
                            </p> -->
              <!-- <p class="mb-1"><strong>Seating
                                    Capacity:</strong> <?= $tour['specifications']['seating_capacity']; ?></p>
                            <p class="mb-1"><strong>Air Condition:</strong>
                                <?= $tour['specifications']['air_conditioning']; ?>
                            </p> -->
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- End Our Fleets Section -->

<!-- Start Airport/Railway Station Section -->
<section class="airport-railway-service-section container py-5">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-10">
      <!-- Section Header -->
      <div class="text-center mb-5">
        <h2 class="section-title">Taxi Services by Famous Tours India</h2>
        <p class="text-muted lead">Comfortable, punctual, and professional taxi services for all your travel
          needs
          across Rajasthan</p>
      </div>

      <div class="row justify-content-center">
        <!-- Airport Taxi Card -->
        <div class="col-lg-6 mb-4">
          <div class="service-card">
            <div class="card-img-container">
              <img src="https://cdn.pixabay.com/photo/2016/11/13/21/45/airport-1822133_1280.jpg"
                alt="Airport Taxi Service">
              <div class="card-overlay"></div>
              <span class="badge-popular">Most Popular</span>
            </div>
            <div class="card-content">
              <div class="service-icon airport-icon">
                <i class="fas fa-plane"></i>
              </div>
              <h3 class="service-title">Airport Taxi Pick-up & Drop</h3>
              <p class="text-muted">
                Smooth, safe, and on-time transfers from Jaipur Airport to hotels or major cities
                across
                Rajasthan.
              </p>

              <div class="service-features">
                <div class="feature-item">
                  <span class="feature-icon"><i class="fas fa-clock"></i></span>
                  <span>On-Time Pick-up Guaranteed</span>
                </div>
                <div class="feature-item">
                  <span class="feature-icon"><i class="fas fa-car"></i></span>
                  <span>Clean & Comfortable Vehicles</span>
                </div>
                <div class="feature-item">
                  <span class="feature-icon"><i class="fas fa-route"></i></span>
                  <span>City & Outstation Transfers</span>
                </div>
                <div class="feature-item">
                  <span class="feature-icon"><i class="fas fa-headset"></i></span>
                  <span>24/7 Customer Support</span>
                </div>
              </div>

              <a href="tel:<?php echo $phone; ?>" class="btn-booking">
                <i class="fas fa-phone-alt me-1"></i> Call for Booking
              </a>
            </div>
          </div>
        </div>

        <!-- Railway Taxi Card -->
        <div class="col-lg-6 mb-4">
          <div class="service-card">
            <div class="card-img-container">
              <img src="https://cdn.pixabay.com/photo/2021/01/29/06/56/trains-5960009_1280.jpg"
                alt="Railway Taxi Service">
              <div class="card-overlay"></div>
            </div>
            <div class="card-content">
              <div class="service-icon railway-icon">
                <i class="fas fa-train"></i>
              </div>
              <h3 class="service-title">Railway Station Taxi Service</h3>
              <p class="text-muted">
                Hassle-free transfers from Jaipur Junction to hotels, homes, or tourist spots with
                professional drivers.
              </p>

              <div class="service-features">
                <div class="feature-item">
                  <span class="feature-icon"><i class="fas fa-map-marker-alt"></i></span>
                  <span>Real-Time Tracking</span>
                </div>
                <div class="feature-item">
                  <span class="feature-icon"><i class="fas fa-location-arrow"></i></span>
                  <span>Local & Outstation Rides</span>
                </div>
                <div class="feature-item">
                  <span class="feature-icon"><i class="fas fa-user-tie"></i></span>
                  <span>Experienced Drivers</span>
                </div>
                <div class="feature-item">
                  <span class="feature-icon"><i class="fas fa-credit-card"></i></span>
                  <span>Online Booking Available</span>
                </div>
              </div>

              <a href="tel:<?php echo $phone; ?>" class="btn-booking">
                <i class="fas fa-phone-alt me-1"></i> Call for Booking
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Additional Info -->
      <div class="row mt-5">
        <div class="col-12">
          <div class="bg-white p-4 rounded-3 shadow-sm">
            <div class="row align-items-center">
              <div class="col-md-8">
                <h4 class="mb-1">Need a customized taxi service?</h4>
                <p class="mb-0 text-muted">We offer special packages for sightseeing and multi-city
                  tours
                </p>
              </div>
              <div class="col-md-4 text-md-end">
                <a href="tel:<?php echo $phone; ?>"
                  class="btn btn-outline-primary px-4 rounded-pill">Enquire
                  Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Airport/Railway Station Section -->

<!-- Start CTA Section -->
<section class="cta-section py-5 text-center"
  style="background: linear-gradient(135deg, #4285F4, #34A853, #FBBC05, #EA4335); color: #fff;">
  <div class="container" style="background: rgba(234, 231, 231, 0.28); padding: 40px; border-radius: 15px;">
    <h2 class="fw-bold mb-3">Plan Your Dream Trip with <span style="text-shadow: 1px 1px 2px #000;">Famous Tours
        India</span>!</h2>
    <p class="lead mb-4">
      <i class="fas fa-check-circle me-2"></i> Verified Business on Google |
      <i class="fas fa-star me-1"></i> 4.9 Google Rating |
      <i class="fab fa-tripadvisor me-1"></i> Trusted on TripAdvisor
    </p>
    <p class="mb-4" style="text-shadow: 1px 1px 2px #000;">
      Explore the best travel packages, memorable experiences, and hassle-free bookings. Let us make your journey
      unforgettable!
    </p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="tel:<?php echo $phone; ?>" class="btn btn-light btn-lg text-primary fw-bold">
        <i class="fas fa-phone-alt me-2"></i> Call Now
      </a>
      <a href="https://g.page/r/CZGV27DW_7CCEBM/review" target="_blank"
        class="btn btn-light btn-lg text-success fw-bold">
        <i class="fas fa-star me-2"></i> Give a Review
      </a>
      <a href="https://www.tripadvisor.in/Attraction_Review-g304555-d28107578-Reviews-Famous_Tours_India-Jaipur_Jaipur_District_Rajasthan.html"
        target="_blank" class="btn btn-light btn-lg text-warning fw-bold">
        <i class="fab fa-tripadvisor me-2"></i> Check Us on TripAdvisor
      </a>
    </div>
  </div>
</section>
<!-- End CTA Section -->

<!-- Start Rajasthan Tours Section -->
<section class="rajasthan-tours-section py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title">Explore Rajasthan Tours</h2>
      <p class="text-muted lead">Discover the land of kings with our curated tour packages</p>
    </div>

    <div class="row">
      <?php foreach ($tourPackages as $pkg): ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="package-card">
            <div class="package-header">
              <h3 class="package-name"><?php echo $pkg['name']; ?></h3>
              <div class="package-days"><?php echo $pkg['duration']; ?></div>
            </div>
            <div class="package-content">
              <div class="package-features">
                <?php if (!empty($pkg['route'])): ?>
                  <div class="package-feature">
                    <span class="feature-icon"><i class="fas fa-map-marker-alt"></i></span>
                    <span><?php echo $pkg['route']; ?></span>
                  </div>
                <?php endif; ?>

                <?php if (!empty($pkg['accommodation'])): ?>
                  <div class="package-feature">
                    <span class="feature-icon"><i class="fas fa-hotel"></i></span>
                    <span><?php echo $pkg['accommodation']; ?></span>
                  </div>
                <?php endif; ?>

                <?php if (!empty($pkg['transport'])): ?>
                  <div class="package-feature">
                    <span class="feature-icon"><i class="fas fa-car"></i></span>
                    <span><?php echo $pkg['transport']; ?></span>
                  </div>
                <?php endif; ?>
              </div>
              <div>
                <?php if ($pkg['is_popular']): ?>
                  <span class="popular-badge">Most Popular</span>
                <?php endif; ?>
                <div class="catch-line">
                  <p><?php echo $pkg['catch_line']; ?></p>
                </div>
              </div>
              <a href="tel:<?php echo $phone; ?>" class="btn btn-outline-primary w-100">Enquire Now</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- End Rajasthan Tours Section -->

<?php
$page_content = ob_get_clean();

include 'rootlayout.php';
