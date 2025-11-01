<?php
// SEO Configuration
$page_title = "Home - Modern PHP Travel Platform";
$page_description = "Discover amazing travel experiences with our modern PHP platform. Best deals guaranteed!";
$page_keywords = "travel, php, modern, booking";
$page_canonical = "https://example.com/";

// Custom CSS
ob_start();
?>
<style>
  .hero-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  }

  .parallax-section {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .fade-in {
    animation: fadeIn 1s ease-in;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>
<?php
$custom_css = ob_get_clean();

// Custom JavaScript
ob_start();
?>
<script>
  // Home page specific functionality
  document.addEventListener('DOMContentLoaded', function() {
    console.log('Home Page Loaded');

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth'
          });
        }
      });
    });

    // Animation on scroll
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('fade-in');
        }
      });
    }, observerOptions);

    // Observe all sections
    document.querySelectorAll('section').forEach(section => {
      observer.observe(section);
    });
  });
</script>
<?php
$custom_js = ob_get_clean();

// Additional meta tags
$additional_meta = [
  '<meta name="robots" content="index, follow">',
  '<meta name="author" content="Your Company">',
  '<link rel="preconnect" href="https://fonts.googleapis.com">',
  '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>'
];

// Page Content
ob_start();
?>
<!-- Hero Section -->
<section class="hero-gradient min-h-screen flex items-center justify-center text-white">
  <div class="text-center fade-in">
    <h1 class="text-5xl md:text-7xl font-bold mb-6">Welcome to FTITravel</h1>
    <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">
      Discover amazing travel experiences with our modern PHP platform
    </p>
    <button class="bg-white text-purple-600 px-8 py-3 rounded-lg font-bold text-lg hover:bg-gray-100 transition duration-300">
      Explore Destinations
    </button>
  </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-4">
    <h2 class="text-4xl font-bold text-center mb-12">Why Choose Us?</h2>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="text-center p-6">
        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
          <span class="text-2xl">🚀</span>
        </div>
        <h3 class="text-xl font-bold mb-2">Fast & Modern</h3>
        <p class="text-gray-600">Built with modern PHP practices for optimal performance</p>
      </div>
      <div class="text-center p-6">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
          <span class="text-2xl">🔒</span>
        </div>
        <h3 class="text-xl font-bold mb-2">Secure</h3>
        <p class="text-gray-600">Your data is protected with enterprise-grade security</p>
      </div>
      <div class="text-center p-6">
        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
          <span class="text-2xl">⭐</span>
        </div>
        <h3 class="text-xl font-bold mb-2">SEO Optimized</h3>
        <p class="text-gray-600">Built-in SEO features to help you rank better</p>
      </div>
    </div>
  </div>
</section>
<?php
$page_content = ob_get_clean();

// Include the layout
include __DIR__ . '/../layouts/main.php';
?>
