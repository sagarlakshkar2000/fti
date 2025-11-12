<?php
$current_page = basename($_SERVER['PHP_SELF']);
include './utils/info.php';

// Page specific SEO
$page_title = "Contact Us | Famous Tours India – Book Taxi & Tour Packages Jaipur";
$page_description = "Contact Famous Tours India for taxi bookings, Rajasthan tour packages, and sightseeing inquiries. 24/7 customer support for Jaipur, Golden Triangle, and religious tours.";
$page_keywords = "contact Famous Tours India, Jaipur taxi booking, Rajasthan package inquiry, tour contact Jaipur, book cab Jaipur, Golden Triangle support, travel agency Jaipur contact, FTI Travel phone, Rajasthan travel help";
$page_canonical = "https://www.famoustoursindia.com/contact.php";

// Page content
ob_start();
?>


<!-- Breadcrumb Section -->
<section class="bg-gradient-to-r from-orange-600 to-amber-500 py-14">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-2 text-white text-sm">
      <a href="index.php" class="hover:text-orange-200 transition duration-300">
        <i class="fas fa-home"></i> Home
      </a>
      <i class="fas fa-chevron-right text-xs"></i>
      <span class="text-orange-200 font-semibold">Contact Us</span>
    </div>
    <h1 class="text-3xl md:text-4xl font-bold text-white mt-4">Get In Touch</h1>
    <p class="text-orange-100 text-lg mt-2">We're here to help you plan your perfect journey</p>
  </div>
</section>

<!-- Contact Info & Form Section -->
<section class="py-16">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">

      <!-- Contact Information -->
      <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-gray-100">
          <h2 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h2>

          <div class="space-y-6">
            <!-- Phone -->
            <div class="flex items-start gap-4">
              <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                <i class="fas fa-phone text-lg"></i>
              </div>
              <div>
                <h3 class="font-semibold text-gray-900">Call Us</h3>
                <a href="tel:<?php echo $phone; ?>" class="text-gray-600 hover:text-orange-600 transition duration-300 block mt-1">
                  <?php echo $phone; ?>
                </a>
                <p class="text-sm text-gray-500 mt-1">24/7 Customer Support</p>
              </div>
            </div>

            <!-- Email -->
            <div class="flex items-start gap-4">
              <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                <i class="fas fa-envelope text-lg"></i>
              </div>
              <div>
                <h3 class="font-semibold text-gray-900">Email Us</h3>
                <a href="mailto:<?php echo $email; ?>" class="text-gray-600 hover:text-orange-600 transition duration-300 block mt-1">
                  <?php echo $email; ?>
                </a>
                <p class="text-sm text-gray-500 mt-1">We'll respond quickly</p>
              </div>
            </div>

            <!-- Address -->
            <div class="flex items-start gap-4">
              <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                <i class="fas fa-map-marker-alt text-lg"></i>
              </div>
              <div>
                <h3 class="font-semibold text-gray-900">Visit Us</h3>
                <p class="text-gray-600 mt-1">Jaipur, Rajasthan</p>
                <p class="text-sm text-gray-500 mt-1">The Pink City</p>
              </div>
            </div>

            <!-- Business Hours -->
            <div class="flex items-start gap-4">
              <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                <i class="fas fa-clock text-lg"></i>
              </div>
              <div>
                <h3 class="font-semibold text-gray-900">Business Hours</h3>
                <p class="text-gray-600 mt-1">24/7 Available</p>
                <p class="text-sm text-gray-500 mt-1">For taxi bookings & support</p>
              </div>
            </div>
          </div>

          <!-- Social Media -->
          <div class="mt-8 pt-6 border-t border-gray-200">
            <h3 class="font-semibold text-gray-900 mb-4">Follow Us</h3>
            <div class="flex gap-3">
              <a href="<?php echo $facebook; ?>" target="_blank" class="bg-gray-800 text-white p-3 rounded-lg transition-all duration-300 transform hover:scale-110 border-2 border-transparent hover:border-orange-500">
                <i class="fab fa-facebook-f text-white"></i>
              </a>
              <a href="<?php echo $instagram; ?>" target="_blank" class="bg-gray-800 text-white p-3 rounded-lg transition-all duration-300 transform hover:scale-110 border-2 border-transparent hover:border-orange-500">
                <i class="fab fa-instagram text-white"></i>
              </a>
              <a href="<?php echo $linkedin; ?>" target="_blank" class="bg-gray-800 text-white p-3 rounded-lg transition-all duration-300 transform hover:scale-110 border-2 border-transparent hover:border-orange-500">
                <i class="fab fa-linkedin-in text-white"></i>
              </a>
              <a href="<?php echo $x; ?>" target="_blank" class="bg-gray-800 text-white p-3 rounded-lg transition-all duration-300 transform hover:scale-110 border-2 border-transparent hover:border-orange-500">
                <i class="fab fa-twitter text-white"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-gray-100">
          <h2 class="text-2xl font-bold text-gray-900 mb-2">Send us a Message</h2>
          <p class="text-gray-600 mb-6">Fill out the form below and we'll get back to you soon</p>

          <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Name -->
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                <input type="text" id="name" name="name" required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300"
                  placeholder="Enter your full name">
              </div>

              <!-- Phone -->
              <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                <input type="tel" id="phone" name="phone" required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300"
                  placeholder="Enter your phone number">
              </div>
            </div>

            <!-- Email -->
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
              <input type="email" id="email" name="email"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300"
                placeholder="Enter your email address">
            </div>

            <!-- Service Type -->
            <div>
              <label for="service" class="block text-sm font-medium text-gray-700 mb-2">Service Required</label>
              <select id="service" name="service"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300">
                <option value="">Select a service</option>
                <option value="airport-taxi">Airport Taxi Service</option>
                <option value="railway-taxi">Railway Station Taxi</option>
                <option value="local-sightseeing">Local Sightseeing</option>
                <option value="outstation-tour">Outstation Tour</option>
                <option value="wedding-taxi">Wedding Taxi Service</option>
                <option value="corporate-taxi">Corporate Taxi</option>
                <option value="other">Other</option>
              </select>
            </div>

            <!-- Message -->
            <div>
              <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
              <textarea id="message" name="message" rows="5" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-300"
                placeholder="Tell us about your travel requirements..."></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit"
              class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-4 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
              <i class="fas fa-paper-plane mr-2"></i> Send Message
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Quick Contact CTA -->
<section class="py-12 bg-gradient-to-r from-orange-600 to-amber-500">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Need Immediate Assistance?</h2>
    <p class="text-orange-100 text-lg mb-6">Call us now for instant taxi booking and support</p>
    <a href="tel:<?php echo $phone; ?>"
      class="bg-white text-orange-600 hover:bg-gray-100 font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg inline-flex items-center gap-3 text-lg">
      <i class="fas fa-phone"></i> Call <?php echo $phone; ?>
    </a>
  </div>
</section>

<!-- Google Map Section -->
<section class="py-16 bg-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Find Us</h2>
      <p class="text-gray-600 text-lg max-w-2xl mx-auto">Visit our office in Jaipur or track our taxis in real-time</p>
    </div>

    <div class="bg-gray-200 rounded-2xl overflow-hidden shadow-lg h-96">
      <!-- Google Map Embed -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d644.9711411404526!2d75.743702!3d26.9293855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db3a93933f7b3%3A0x82b0ffd6b0db9591!2sFamous%20Tours%20India!5e1!3m2!1sen!2sin!4v1762024670598!5m2!1sen!2sin" width="100%"
        height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
      <div class="text-center p-6 bg-orange-50 rounded-xl">
        <i class="fas fa-map-marker-alt text-orange-600 text-2xl mb-3"></i>
        <h3 class="font-semibold text-gray-900 mb-2">Office Location</h3>
        <p class="text-gray-600">Jaipur, Rajasthan</p>
      </div>
      <div class="text-center p-6 bg-orange-50 rounded-xl">
        <i class="fas fa-car text-orange-600 text-2xl mb-3"></i>
        <h3 class="font-semibold text-gray-900 mb-2">Service Area</h3>
        <p class="text-gray-600">All Over Rajasthan & North India</p>
      </div>
      <div class="text-center p-6 bg-orange-50 rounded-xl">
        <i class="fas fa-clock text-orange-600 text-2xl mb-3"></i>
        <h3 class="font-semibold text-gray-900 mb-2">Response Time</h3>
        <p class="text-gray-600">Within 15 Minutes</p>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Our Customers Say</h2>
      <p class="text-gray-600 text-lg">Trusted by thousands of happy travellers across Rajasthan</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Testimonial 1 -->
      <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center gap-1 text-amber-400 mb-4">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p class="text-gray-600 mb-4 italic">"Excellent service! The driver was punctual and the car was very clean. Highly recommended for airport transfers in Jaipur."</p>
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center">
            <span class="text-white font-semibold">RS</span>
          </div>
          <div>
            <h4 class="font-semibold text-gray-900">Rahul Sharma</h4>
            <p class="text-gray-500 text-sm">Delhi to Jaipur Trip</p>
          </div>
        </div>
      </div>

      <!-- Testimonial 2 -->
      <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center gap-1 text-amber-400 mb-4">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p class="text-gray-600 mb-4 italic">"Booked for Khatu Shyam Ji darshan. Very professional drivers and comfortable journey. Will use again for sure!"</p>
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center">
            <span class="text-white font-semibold">PS</span>
          </div>
          <div>
            <h4 class="font-semibold text-gray-900">Priya Singh</h4>
            <p class="text-gray-500 text-sm">Khatu Shyam Ji Tour</p>
          </div>
        </div>
      </div>

      <!-- Testimonial 3 -->
      <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center gap-1 text-amber-400 mb-4">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <p class="text-gray-600 mb-4 italic">"Great experience with Golden Triangle tour. The cab was well-maintained and driver was very knowledgeable about the routes."</p>
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center">
            <span class="text-white font-semibold">AK</span>
          </div>
          <div>
            <h4 class="font-semibold text-gray-900">Amit Kumar</h4>
            <p class="text-gray-500 text-sm">Golden Triangle Tour</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
      <p class="text-gray-600 text-lg">Quick answers to common questions</p>
    </div>

    <div class="max-w-4xl mx-auto space-y-6">
      <!-- FAQ 1 -->
      <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
        <h3 class="font-semibold text-gray-900 mb-2 flex items-center gap-3">
          <i class="fas fa-question-circle text-orange-500"></i>
          How do I book a taxi?
        </h3>
        <p class="text-gray-600">You can book through our website, call us directly at <?php echo $phone; ?>, or message us on WhatsApp for instant booking.</p>
      </div>

      <!-- FAQ 2 -->
      <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
        <h3 class="font-semibold text-gray-900 mb-2 flex items-center gap-3">
          <i class="fas fa-question-circle text-orange-500"></i>
          What are your payment options?
        </h3>
        <p class="text-gray-600">We accept cash, UPI, and online payments. Corporate billing options are also available.</p>
      </div>

      <!-- FAQ 3 -->
      <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
        <h3 class="font-semibold text-gray-900 mb-2 flex items-center gap-3">
          <i class="fas fa-question-circle text-orange-500"></i>
          Do you provide outstation services?
        </h3>
        <p class="text-gray-600">Yes, we provide taxi services for outstation trips across Rajasthan and neighboring states with experienced drivers.</p>
      </div>
    </div>
  </div>
</section>

<?php
$page_content = ob_get_clean();
include './layouts/main.php';
?>
