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
$carsData = file_get_contents('data/cars.json');
$carJsonDecodedData = json_decode($carsData, true);
$title = $carJsonDecodedData['cars_section']['title'];
$description = $carJsonDecodedData['cars_section']['description'];
$tours = $carJsonDecodedData['cars_section']['cars'];

$jsonData = file_get_contents('data/taxiservices.json');
$taxiServiceJsonDecodedData = json_decode($jsonData, true);
$faqData = $taxiServiceJsonDecodedData['taxiServices']['jaipurToDelhi']['faq'];
?>
<nav aria-label="breadcrumb" class="custom-breadcrumb-container container-fluid py-2 rounded-3">
    <h3>Get in Touch – Your Journey with Famous Tours India Begins Here</h3>
    <ol class="breadcrumb mb-0 custom-breadcrumb">
        <li class="breadcrumb-item">
            <a href="/" class="d-inline-flex align-items-center">
                Home
            </a>
        </li>
        <li class="breadcrumb-item" aria-current="page">Taxi</li>
        <li class="breadcrumb-item active" aria-current="page">Jaipur To Delhi Taxi</li>
    </ol>
</nav>

<section class="py-5">
  <div class="container">
    <div class="row align-items-center">

      <!-- Left Side Image -->
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img src="https://sys.buzzway.in/public/uploads/jaipur_to_delhi_car_rental.png"
             alt="Jaipur to Delhi Taxi Service"
             class="img-fluid rounded shadow">
      </div>

      <!-- Right Side Content -->
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Jaipur to Delhi Taxi Service</h2>
        <p class="text-muted">
          Enjoy a comfortable and reliable journey with our Jaipur to Delhi taxi service.
          Whether you are traveling for business, leisure, or airport transfers, our
          professional drivers ensure a safe and timely ride.
        </p>
        <ul class="list-unstyled mb-4">
          <li>✔ Affordable & Transparent Pricing</li>
          <li>✔ Comfortable AC Cars</li>
          <li>✔ 24/7 Customer Support</li>
          <li>✔ Experienced Drivers</li>
        </ul>
        <a href="tel:+918107968806" class="btn btn-primary btn-lg rounded-pill">
          Book Now
        </a>
      </div>

    </div>
  </div>
</section>

<!-- Start Our Fleets Section -->
<section class="our-fleet-section container-fluid py-5">
    <div class="container">
        <div class="text-center mb-5">
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
</section>
<!-- End Our Fleets Section -->

<!-- Jaipur to Delhi Taxi Route Section -->
<section class="py-5" style="background-color:#f9f9f9;">
  <div class="container">
    <h2 class="fw-bold mb-4">Jaipur to Delhi Taxi Route with Famous Tours India</h2>
    <p>
      Planning a comfortable journey from <strong>Jaipur to Delhi</strong>? With <strong>Famous Tours India</strong>,
      we make your travel smooth, safe, and enjoyable. Our Jaipur to Delhi taxi service is perfect for family trips,
      business travel, airport transfers, and one-way or round trips.
    </p>

    <h3 class="mt-4 mb-3">Route Overview</h3>
    <p>
      The distance between Jaipur and Delhi is around <strong>270 km</strong>, and it usually takes
      <strong>4.5 to 5.5 hours</strong> depending on traffic and route. The journey covers smooth highways,
      making it comfortable and convenient for travelers.
    </p>

    <h3 class="mt-4 mb-3">Popular Places on the Route</h3>
    <ul>
      <li><strong>Shahpura</strong> – Known for forts and step-wells.</li>
      <li><strong>Neemrana Fort</strong> – A beautiful heritage fort for a quick stop.</li>
      <li><strong>Behror</strong> – Famous for dhabas and local food.</li>
      <li><strong>Gurgaon</strong> – Modern city hub before entering Delhi.</li>
    </ul>

    <h3 class="mt-4 mb-3">Our Taxi Services</h3>
    <ul>
      <li>✔ One-way and round-trip taxi options</li>
      <li>✔ Comfortable AC cars (Sedan, SUV, Tempo Traveller)</li>
      <li>✔ Experienced and polite drivers</li>
      <li>✔ 24/7 customer support</li>
      <li>✔ Transparent pricing with no hidden charges</li>
      <li>✔ Pickup from your doorstep in Jaipur</li>
    </ul>

    <h3 class="mt-4 mb-3">Why Choose Famous Tours India?</h3>
    <p>
      At <strong>Famous Tours India</strong>, we focus on customer satisfaction and safety.
      Our Jaipur to Delhi taxi service ensures you have a stress-free journey with
      reliable drivers, comfortable cars, and on-time pickups. Whether you are heading to
      Delhi for business meetings, airport transfers, or a family trip, our service
      is designed to make your travel memorable.
    </p>
  </div>
</section>
<!-- End Jaipur to Delhi Taxi Route Section -->

<!-- Frequently Asked Questions -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-bold text-center mb-4">Frequently Asked Questions</h2>

    <div class="accordion" id="faqAccordion">
      <?php foreach ($faqData as $index => $faq): ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading<?= $index ?>">
            <button class="accordion-button <?= $index !== 0 ? 'collapsed' : '' ?>" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>"
                    aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $index ?>">
              <?= htmlspecialchars($faq['question']) ?>
            </button>
          </h2>
          <div id="collapse<?= $index ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>"
               aria-labelledby="heading<?= $index ?>" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              <?= htmlspecialchars($faq['answer']) ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- End Frequently Asked Questions -->



<?php
$page_content = ob_get_clean();

include 'rootlayout.php';
