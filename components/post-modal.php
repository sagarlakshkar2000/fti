<?php

/**
 * Post Modal Component
 * Displays posts in a modal with image slider
 */

// Get active posts
require_once __DIR__ . '/../config/db.php';

try {
  // Get the latest active post
  $post = fetchOne("SELECT * FROM posts WHERE status = 'active' ORDER BY created_at DESC LIMIT 1");

  if ($post) {
    // Get images for the post
    $images = fetchAll("SELECT * FROM post_images WHERE post_id = ? ORDER BY sort_order", [$post['id']]);
    $post['images'] = $images;
  }
} catch (Exception $e) {
  $post = null;
}

// Don't show modal if no active post
if (!$post || empty($post['images'])):
  return;
endif;
?>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

<!-- Post Modal -->
<div id="postModal" class="modal-overlay">
  <div class="modal-container">
    <!-- Close Button -->
    <button class="modal-close" onclick="closePostModal()">
      <i class="fas fa-times"></i>
    </button>

    <!-- Modal Content -->
    <div class="modal-content">
      <!-- Image Slider -->
      <div class="swiper postSwiper">
        <div class="swiper-wrapper">
          <?php foreach ($post['images'] as $image): ?>
            <div class="swiper-slide">
              <img src="<?= htmlspecialchars($image['image_path']) ?>" alt="<?= htmlspecialchars($post['title']) ?>">
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Navigation -->
        <?php if (count($post['images']) > 1): ?>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
        <?php endif; ?>
      </div>

      <!-- Post Info -->
      <div class="modal-info">
        <h2><?= htmlspecialchars($post['title']) ?></h2>
        <?php if ($post['description']): ?>
          <p><?= nl2br(htmlspecialchars($post['description'])) ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<style>
  /* Modal Overlay */
  .modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(8px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    padding: 1rem;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
  }

  .modal-overlay.show {
    opacity: 1;
    visibility: visible;
  }

  /* Modal Container */
  .modal-container {
    background: white;
    border-radius: 1rem;
    max-width: 900px;
    width: 100%;
    max-height: 90vh;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    transform: scale(0.9);
    transition: transform 0.3s ease;
    position: relative;
  }

  .modal-overlay.show .modal-container {
    transform: scale(1);
  }

  /* Close Button */
  .modal-close {
    position: absolute;
    top: 1rem;
    right: 1rem;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: #333;
    z-index: 10;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .modal-close:hover {
    background: white;
    transform: rotate(90deg);
    color: #dc2626;
  }

  /* Modal Content */
  .modal-content {
    overflow-y: auto;
    max-height: 90vh;
  }

  /* Swiper Styles */
  .postSwiper {
    width: 100%;
    height: 400px;
  }

  .postSwiper .swiper-slide {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f3f4f6;
  }

  .postSwiper .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .postSwiper .swiper-button-next,
  .postSwiper .swiper-button-prev {
    color: white;
    background: rgba(0, 0, 0, 0.5);
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    transition: all 0.3s ease;
  }

  .postSwiper .swiper-button-next:after,
  .postSwiper .swiper-button-prev:after {
    font-size: 1.25rem;
  }

  .postSwiper .swiper-button-next:hover,
  .postSwiper .swiper-button-prev:hover {
    background: rgba(0, 0, 0, 0.8);
  }

  .postSwiper .swiper-pagination-bullet {
    background: white;
    opacity: 0.5;
  }

  .postSwiper .swiper-pagination-bullet-active {
    background: #fa7d1a;
    opacity: 1;
  }

  /* Post Info */
  .modal-info {
    padding: 2rem;
  }

  .modal-info h2 {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
  }

  .modal-info p {
    font-size: 1rem;
    line-height: 1.6;
    color: #4b5563;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .postSwiper {
      height: 300px;
    }

    .modal-info {
      padding: 1.5rem;
    }

    .modal-info h2 {
      font-size: 1.5rem;
    }

    .modal-info p {
      font-size: 0.875rem;
    }

    .modal-close {
      width: 2rem;
      height: 2rem;
      font-size: 1rem;
    }
  }

  @media (max-width: 480px) {
    .postSwiper {
      height: 250px;
    }

    .modal-container {
      max-height: 95vh;
    }
  }
</style>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  // Initialize Swiper
  const swiper = new Swiper('.postSwiper', {
    loop: <?= count($post['images']) > 1 ? 'true' : 'false' ?>,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    keyboard: {
      enabled: true,
    },
  });

  // Modal functions
  function showPostModal() {
    const modal = document.getElementById('postModal');
    if (modal) {
      // Prevent body scroll
      document.body.style.overflow = 'hidden';

      // Show modal with animation
      setTimeout(() => {
        modal.classList.add('show');
      }, 100);
    }
  }

  function closePostModal() {
    const modal = document.getElementById('postModal');
    if (modal) {
      modal.classList.remove('show');

      // Allow body scroll
      document.body.style.overflow = '';

      // Set session storage to prevent showing again
      sessionStorage.setItem('postModalShown', 'true');
    }
  }

  // Check if modal should be shown
  function shouldShowModal() {
    // Don't show if already shown in this session
    if (sessionStorage.getItem('postModalShown')) {
      return false;
    }
    return true;
  }

  // Show modal on page load
  window.addEventListener('load', () => {
    if (shouldShowModal()) {
      setTimeout(showPostModal, 1000); // Show after 1 second delay
    }
  });

  // Close on ESC key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closePostModal();
    }
  });

  // Close on overlay click
  document.getElementById('postModal').addEventListener('click', (e) => {
    if (e.target.id === 'postModal') {
      closePostModal();
    }
  });
</script>
