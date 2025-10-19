<?php
include('./utils/info.php');

// Page specific SEO
$page_title = "Contact Us | Explore Best Travel Packages";
$page_description = "Get in touch with FTI Travel for inquiries about our travel packages. We're here to help you plan your dream vacation.";
$page_keywords = "contact, travel inquiries, FTI Travel";
$page_canonical = "https://www.famoustoursindia.com/contact.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // You can send mail here or store in DB
    // mail($to, $subject, $message, "From: $email");

    $successMsg = "Thank you, $name! Your message has been received. We’ll get back to you soon.";
}

// Page content
ob_start();
?>

<nav aria-label="breadcrumb" class="custom-breadcrumb-container container-fluid py-2 rounded-3">
    <h3>Get in Touch – Your Journey with Famous Tours India Begins Here</h3>
    <ol class="breadcrumb mb-0 custom-breadcrumb">
        <li class="breadcrumb-item">
            <a href="/" class="d-inline-flex align-items-center">
                Home
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
    </ol>
</nav>

<section class="contact-section py-5 ">
    <div class="container">
        <div class="contact-card row g-0">
            <!-- Contact Info -->
            <div class="col-lg-5 contact-info d-flex flex-column justify-content-start">
                <h2>Contact Us</h2>
                <p>We’d love to hear from you! Reach out to us with any questions or tour inquiries.</p>
                <p><strong>📍 Address:</strong> Jaipur, Rajasthan, India</p>
                <p><strong>📞 Phone:</strong> <a href="tel:<?php echo $phone; ?>"
                        class="text-white"><?php echo $phone; ?></a></p>
                <p><strong>📧 Email:</strong> <a href="mailto:<?php echo $email; ?>"
                        class="text-white"><?php echo $email; ?></a>
                </p>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7 contact-form">
                <?php if (!empty($successMsg)): ?>
                    <div class="alert alert-success"><?= $successMsg; ?></div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Message</label>
                            <textarea name="message" rows="5" class="form-control" placeholder="Write your message..."
                                required></textarea>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-custom px-4 py-2 rounded-pill">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
$page_content = ob_get_clean();

include 'rootlayout.php';