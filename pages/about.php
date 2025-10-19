<?php
include('./utils/info.php');

// Page specific SEO
$page_title = "FTI Travel | Explore Best Travel Packages";
$page_description = "Book your dream travel package with FTI Travel. Affordable trips, luxury vacations, and adventure tours worldwide.";
$page_keywords = "travel, tour packages, holidays, vacations, FTI Travel";
$page_canonical = "https://www.ftitravel.com/";
// Page content
ob_start();

// Read JSON file
$jsonData = file_get_contents('data/cars.json');
$jsonDecodedData = json_decode($jsonData, true);
$taxiServices = $jsonDecodedData['cars_section']['taxi_services'];
$tourPackages = $jsonDecodedData['cars_section']['tourPackages'];

$memories = [
    [
        "title" => "Jaipur Tour",
        "image" => "https://famoustoursindia.com/assets/images/home/jaipur.jpg"
    ],
    [
        "title" => "Udaipur Tour",
        "image" => "https://famoustoursindia.com/assets/images/home/udaipur.jpg"
    ],
    [
        "title" => "Jaisalmer Tour",
        "image" => "https://famoustoursindia.com/assets/images/home/jaisalmer.jpg"
    ],
];

?>
<nav aria-label="breadcrumb" class="custom-breadcrumb-container  container-fluid py-2 rounded-3">
    <h3>about Quick Cab Services Jaipur</h3>
    <ol class="breadcrumb mb-0 custom-breadcrumb">
        <li class="breadcrumb-item">
            <a href="/" class="d-inline-flex align-items-center">
                Home
            </a>
        </li>

        <li class="breadcrumb-item active" aria-current="page">About Us</li>
    </ol>
</nav>

<!-- About Us Section -->
<section class="section-padding py-5">
    <div class="container">
        <h2 class="text-center mb-5">About Quick Cab Services Jaipur</h2>
        <div class="row">
            <div class="col-md-6">
                <h5 class="h2">Welcome to Famous Tours India – <span class="text-warning fw-bold">Your Trusted Travel
                        Partner</span>!</h5>
                <p>Since our journey began in 2012, Famous Tours India has been committed to providing travelers with
                    safe, comfortable, and memorable journeys across India. Headquartered in the heart of Jaipur,
                    Rajasthan, we specialize in offering premium cab services, guided tours, airport transfers,
                    outstation trips, and customized travel packages.
                </p>
                <p>
                    Our team of professional drivers, experienced guides, and travel experts ensures that every trip is
                    more than just travel—it’s an experience filled with comfort, culture, and discovery. Whether you
                    are exploring the vibrant streets of Jaipur, the royal forts of Rajasthan, or embarking on an
                    outstation journey across India, we make your travel smooth and stress-free.
                </p>
            </div>
            <div class="col-md-6">
                <img src="https://famoustoursindia.com/assets/images/home/rajasthan_tours.jpg" class="img-fluid rounded"
                    alt="Quick Cab Services Jaipur">
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section-padding why-choose-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-white">Why Choose Us?</h2>
            <p class="text-light">Trusted by thousands of happy travelers across India</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="why-box d-flex align-items-start p-4 h-100">
                    <span class="icon bg-primary text-white"><i class="fas fa-check-circle"></i></span>
                    <div>
                        <h6 class="fw-semibold mb-1 text-white">Verified Google Business</h6>
                        <p class="text-light mb-0">Trusted by thousands with a verified Google Business profile.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="why-box d-flex align-items-start p-4 h-100">
                    <span class="icon bg-warning text-dark"><i class="fas fa-star"></i></span>
                    <div>
                        <h6 class="fw-semibold mb-1 text-white">4.9+ Google Rating</h6>
                        <p class="text-light mb-0">Consistently rated highly by our satisfied customers.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="why-box d-flex align-items-start p-4 h-100">
                    <span class="icon bg-success text-white"><i class="fas fa-users"></i></span>
                    <div>
                        <h6 class="fw-semibold mb-1 text-white">Experienced Local Guides</h6>
                        <p class="text-light mb-0">Knowledgeable guides to make your journey unforgettable.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="why-box d-flex align-items-start p-4 h-100">
                    <span class="icon bg-danger text-white"><i class="fas fa-car"></i></span>
                    <div>
                        <h6 class="fw-semibold mb-1 text-white">Comfortable Vehicles</h6>
                        <p class="text-light mb-0">Travel in style with our well-maintained fleet.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="why-box d-flex align-items-start p-4 h-100">
                    <span class="icon bg-info text-dark"><i class="fas fa-map"></i></span>
                    <div>
                        <h6 class="fw-semibold mb-1 text-white">Customizable Tour Packages</h6>
                        <p class="text-light mb-0">Tailored itineraries to suit your preferences.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Customer Testimonials -->
<section id="testimonials" class="section-padding testimonials-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-white">What Our Customers Say</h2>
            <p class="text-light">Real stories from travelers who explored with Famous Tours India</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="testimonial-box p-4 h-100">
                    <i class="fas fa-quote-left fa-2x text-warning mb-3"></i>
                    <p class="mb-3">Amazing experience with Famous Tours India! The guides were knowledgeable, and the
                        trip was well-organized.</p>
                    <p class="mb-0 text-end fw-semibold">- Priya, Delhi</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="testimonial-box p-4 h-100">
                    <i class="fas fa-quote-left fa-2x text-warning mb-3"></i>
                    <p class="mb-3">Comfortable vehicles and excellent service. Highly recommend their Rajasthan tour!
                    </p>
                    <p class="mb-0 text-end fw-semibold">- Rohan, Mumbai</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="testimonial-box p-4 h-100">
                    <i class="fas fa-quote-left fa-2x text-warning mb-3"></i>
                    <p class="mb-3">Best travel company for customized packages. Will travel with them again!</p>
                    <p class="mb-0 text-end fw-semibold">- Sneha, Bangalore</p>
                </div>
            </div>
        </div>
    </div>
</section>

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

<!-- Gallery -->
<section class="section-padding py-5" style="background-color:#f9f9f9;">
    <div class="container">
        <h2 class="text-center mb-5">Travel Memories</h2>
        <div class="row g-4">
            <?php foreach ($memories as $memory): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="memory-card position-relative overflow-hidden rounded shadow-sm">
                        <img src="<?= $memory['image']; ?>" class="img-fluid w-100" alt="<?= $memory['title']; ?>">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <h5 class="text-white"><?= $memory['title']; ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section id="contact" class="section-padding text-center py-5"
    style="background: var(--gradient); color: var(--white);">
    <div class="container">
        <h2 class="mb-4">Ready to Explore India?</h2>
        <p class="lead mb-4">Book your trip or contact us for customized tour packages!</p>
        <a href="tel:<?php echo $phone; ?>" class="btn btn-primary btn-lg me-3">Book Your Trip Now</a>
        <a href="https://wa.me/<?php echo $phone; ?>" class="btn whatsapp-btn btn-lg"><i
                class="fab fa-whatsapp me-2"></i> WhatsApp Us</a>
        <a href="tel:<?php echo $phone; ?>" class="btn btn-primary btn-lg ms-3"><i class="fas fa-phone me-2"></i> Call
            Us</a>
    </div>
</section>

<?php
$page_content = ob_get_clean();

include 'rootlayout.php';