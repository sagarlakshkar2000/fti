<?php

/**
 * Upload Post Page
 */
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/config.php';

// Require authentication
requireAuth();

// Set page variables
$page_title = 'Upload New Post';
$page_subtitle = 'Create a new post with images';

// Handle form submission
$success = isset($_GET['success']) ? true : false;
$error = isset($_GET['error']) ? $_GET['error'] : '';

// Page content
ob_start();
?>

<div class="max-w-4xl mx-auto">
  <!-- Success Message -->
  <?php if ($success): ?>
    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
      <div class="flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        <p>Post uploaded successfully!</p>
      </div>
    </div>
  <?php endif; ?>

  <!-- Error Message -->
  <?php if ($error): ?>
    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
      <div class="flex items-center">
        <i class="fas fa-exclamation-circle mr-2"></i>
        <p><?= htmlspecialchars($error) ?></p>
      </div>
    </div>
  <?php endif; ?>

  <!-- Upload Form -->
  <form id="uploadForm" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
    <!-- Title -->
    <div class="mb-6">
      <label for="title" class="block text-gray-700 font-medium mb-2">
        <i class="fas fa-heading mr-2"></i>Post Title *
      </label>
      <input
        type="text"
        id="title"
        name="title"
        required
        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
        placeholder="Enter post title">
    </div>

    <!-- Description -->
    <div class="mb-6">
      <label for="description" class="block text-gray-700 font-medium mb-2">
        <i class="fas fa-align-left mr-2"></i>Description
      </label>
      <textarea
        id="description"
        name="description"
        rows="4"
        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent"
        placeholder="Enter post description"></textarea>
    </div>

    <!-- Images Upload -->
    <div class="mb-6">
      <label class="block text-gray-700 font-medium mb-2">
        <i class="fas fa-images mr-2"></i>Upload Images *
      </label>

      <!-- Drag & Drop Area -->
      <div id="dropArea" class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-orange-500 transition cursor-pointer">
        <i class="fas fa-cloud-upload-alt text-5xl text-gray-400 mb-4"></i>
        <p class="text-gray-600 mb-2">Drag & drop images here or click to browse</p>
        <p class="text-sm text-gray-500">Supports: JPG, PNG, WebP (Max 5MB each)</p>
        <input
          type="file"
          id="imageInput"
          name="images[]"
          multiple
          accept="image/jpeg,image/jpg,image/png,image/webp"
          class="hidden">
      </div>

      <!-- Image Previews -->
      <div id="imagePreviews" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4"></div>
    </div>

    <!-- Status -->
    <div class="mb-6">
      <label class="flex items-center cursor-pointer">
        <div class="relative">
          <input type="checkbox" id="status" name="status" value="active" checked class="sr-only">
          <div class="toggle-bg w-14 h-8 bg-gray-300 rounded-full shadow-inner"></div>
          <div class="toggle-dot absolute w-6 h-6 bg-white rounded-full shadow left-1 top-1 transition"></div>
        </div>
        <div class="ml-3 text-gray-700 font-medium">
          <i class="fas fa-toggle-on mr-2"></i>Active
        </div>
      </label>
    </div>

    <!-- Submit Button -->
    <div class="flex gap-4">
      <button
        type="submit"
        id="submitBtn"
        class="flex-1 bg-gradient-to-r from-orange-600 to-orange-500 text-white py-3 px-6 rounded-lg font-semibold hover:shadow-lg transition">
        <i class="fas fa-check mr-2"></i>Upload Post
      </button>
      <a
        href="manage-posts.php"
        class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition">
        <i class="fas fa-times mr-2"></i>Cancel
      </a>
    </div>
  </form>
</div>

<style>
  #status:checked~.toggle-bg {
    background-color: #fa7d1a;
  }

  #status:checked~.toggle-dot {
    transform: translateX(100%);
  }

  .preview-image {
    position: relative;
    aspect-ratio: 4/3;
    overflow: hidden;
    border-radius: 0.5rem;
    border: 2px solid #e5e7eb;
  }

  .preview-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .preview-image .remove-btn {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
    background: rgba(239, 68, 68, 0.9);
    color: white;
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
  }

  .preview-image .remove-btn:hover {
    background: rgba(220, 38, 38, 1);
    transform: scale(1.1);
  }
</style>

<script>
  const dropArea = document.getElementById('dropArea');
  const imageInput = document.getElementById('imageInput');
  const imagePreviews = document.getElementById('imagePreviews');
  const uploadForm = document.getElementById('uploadForm');
  const submitBtn = document.getElementById('submitBtn');

  let selectedFiles = [];

  // Click to open file picker
  dropArea.addEventListener('click', () => imageInput.click());

  // Drag and drop events
  ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
  });

  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  // Highlight drop area
  ['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, () => {
      dropArea.classList.add('border-orange-500', 'bg-orange-50');
    }, false);
  });

  ['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, () => {
      dropArea.classList.remove('border-orange-500', 'bg-orange-50');
    }, false);
  });

  // Handle dropped files
  dropArea.addEventListener('drop', (e) => {
    const files = e.dataTransfer.files;
    handleFiles(files);
  }, false);

  // Handle selected files
  imageInput.addEventListener('change', (e) => {
    handleFiles(e.target.files);
  });

  function handleFiles(files) {
    selectedFiles = [...files];
    displayPreviews();
  }

  function displayPreviews() {
    imagePreviews.innerHTML = '';

    selectedFiles.forEach((file, index) => {
      const reader = new FileReader();

      reader.onload = (e) => {
        const div = document.createElement('div');
        div.className = 'preview-image';
        div.innerHTML = `
                <img src="${e.target.result}" alt="Preview ${index + 1}">
                <div class="remove-btn" onclick="removeImage(${index})">
                    <i class="fas fa-times"></i>
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-xs p-2">
                    ${file.name}
                </div>
            `;
        imagePreviews.appendChild(div);
      };

      reader.readAsDataURL(file);
    });
  }

  function removeImage(index) {
    selectedFiles.splice(index, 1);
    displayPreviews();
  }

  // Form submission
  uploadForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    // Validate
    if (selectedFiles.length === 0) {
      alert('Please select at least one image');
      return;
    }

    // Disable button
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Uploading...';

    // Prepare form data
    const formData = new FormData();
    formData.append('title', document.getElementById('title').value);
    formData.append('description', document.getElementById('description').value);
    formData.append('status', document.getElementById('status').checked ? 'active' : 'inactive');

    selectedFiles.forEach((file) => {
      formData.append('images[]', file);
    });

    try {
      const response = await fetch('<?= BASE_URL ?>/api/post-api.php?action=create', {
        method: 'POST',
        body: formData
      });

      const result = await response.json();

      if (result.success) {
        window.location.href = 'manage-posts.php?success=1';
      } else {
        alert('Error: ' + result.error);
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Upload Post';
      }
    } catch (error) {
      alert('Upload failed: ' + error.message);
      submitBtn.disabled = false;
      submitBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Upload Post';
    }
  });
</script>

<?php
$page_content = ob_get_clean();
include __DIR__ . '/../layouts/admin-layout.php';
?>
