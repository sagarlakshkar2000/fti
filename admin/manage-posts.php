<?php

/**
 * Manage Posts Page
 */
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';

// Require authentication
requireAuth();

// Set page variables
$page_title = 'Manage Posts';
$page_subtitle = 'View and manage all posts';

// Get all posts
$posts = fetchAll("SELECT p.*,
                         (SELECT COUNT(*) FROM post_images WHERE post_id = p.id) as image_count,
                         (SELECT image_path FROM post_images WHERE post_id = p.id ORDER BY sort_order LIMIT 1) as thumbnail
                  FROM posts p
                  ORDER BY p.created_at DESC");

// Success message
$success = isset($_GET['success']) ? true : false;

// Page content
ob_start();
?>

<div>
  <!-- Header with Action Button -->
  <div class="flex justify-between items-center mb-6">
    <div>
      <p class="text-gray-600">Total: <?= count($posts) ?> posts</p>
    </div>
    <a
      href="upload-post.php"
      class="bg-gradient-to-r from-orange-600 to-orange-500 text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition">
      <i class="fas fa-plus mr-2"></i>New Post
    </a>
  </div>

  <!-- Success Message -->
  <?php if ($success): ?>
    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
      <div class="flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        <p>Operation completed successfully!</p>
      </div>
    </div>
  <?php endif; ?>

  <!-- Posts Grid -->
  <?php if (empty($posts)): ?>
    <div class="bg-white rounded-lg shadow-md p-12 text-center">
      <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
      <h3 class="text-xl font-semibold text-gray-700 mb-2">No Posts Yet</h3>
      <p class="text-gray-600 mb-6">Get started by creating your first post</p>
      <a
        href="upload-post.php"
        class="inline-block bg-gradient-to-r from-orange-600 to-orange-500 text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition">
        <i class="fas fa-plus mr-2"></i>Create First Post
      </a>
    </div>
  <?php else: ?>
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      <?php foreach ($posts as $post): ?>
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
          <!-- Thumbnail -->
          <div class="h-48 bg-gray-200 overflow-hidden">
            <?php if ($post['thumbnail']): ?>
              <img
                src="<?= htmlspecialchars($post['thumbnail']) ?>"
                alt="<?= htmlspecialchars($post['title']) ?>"
                class="w-full h-full object-cover">
            <?php else: ?>
              <div class="w-full h-full flex items-center justify-center">
                <i class="fas fa-image text-5xl text-gray-400"></i>
              </div>
            <?php endif; ?>
          </div>

          <!-- Content -->
          <div class="p-4">
            <div class="flex items-start justify-between mb-2">
              <h3 class="text-lg font-semibold text-gray-800 flex-1"><?= htmlspecialchars($post['title']) ?></h3>
              <span class="ml-2 px-2 py-1 text-xs rounded-full <?= $post['status'] === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' ?>">
                <?= ucfirst($post['status']) ?>
              </span>
            </div>

            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
              <?= htmlspecialchars(substr($post['description'], 0, 100)) ?>
              <?= strlen($post['description']) > 100 ? '...' : '' ?>
            </p>

            <!-- Meta Info -->
            <div class="flex items-center text-xs text-gray-500 mb-4">
              <div class="flex items-center mr-4">
                <i class="far fa-images mr-1"></i>
                <?= $post['image_count'] ?> images
              </div>
              <div class="flex items-center">
                <i class="far fa-calendar mr-1"></i>
                <?= date('M j, Y', strtotime($post['created_at'])) ?>
              </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-2">
              <button
                onclick="viewPost(<?= $post['id'] ?>)"
                class="flex-1 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition text-sm">
                <i class="far fa-eye mr-1"></i>View
              </button>
              <button
                onclick="toggleStatus(<?= $post['id'] ?>, '<?= $post['status'] ?>')"
                class="flex-1 bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600 transition text-sm">
                <i class="fas fa-toggle-on mr-1"></i>Toggle
              </button>
              <button
                onclick="deletePost(<?= $post['id'] ?>)"
                class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition text-sm">
                <i class="far fa-trash-alt"></i>
              </button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<!-- View Post Modal -->
<div id="viewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50" style="display: none;">
  <div class="bg-white rounded-lg max-w-4xl w-full mx-4 max-h-[90vh] overflow-y-auto">
    <div class="p-6">
      <div class="flex justify-between items-start mb-4">
        <h3 id="modalTitle" class="text-2xl font-bold text-gray-800"></h3>
        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
          <i class="fas fa-times text-2xl"></i>
        </button>
      </div>
      <div id="modalContent"></div>
    </div>
  </div>
</div>

<script>
  async function viewPost(id) {
    try {
      const response = await fetch(`<?= BASE_URL ?>/api/post-api.php?action=get&id=${id}`);
      const result = await response.json();

      if (result.success) {
        const post = result.post;
        document.getElementById('modalTitle').textContent = post.title;

        let imagesHTML = '';
        if (post.images && post.images.length > 0) {
          imagesHTML = '<div class="grid grid-cols-2 gap-4 mb-4">';
          post.images.forEach(img => {
            imagesHTML += `<img src="${img.image_path}" class="w-full rounded-lg shadow" alt="Post image">`;
          });
          imagesHTML += '</div>';
        }

        document.getElementById('modalContent').innerHTML = `
                ${imagesHTML}
                <div class="mb-4">
                    <p class="text-gray-700">${post.description || 'No description'}</p>
                </div>
                <div class="flex items-center text-sm text-gray-500">
                    <span class="mr-4"><i class="far fa-calendar mr-1"></i>${new Date(post.created_at).toLocaleDateString()}</span>
                    <span class="px-2 py-1 rounded-full text-xs ${post.status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700'}">
                        ${post.status.charAt(0).toUpperCase() + post.status.slice(1)}
                    </span>
                </div>
            `;

        document.getElementById('viewModal').style.display = 'flex';
      } else {
        alert('Failed to load post');
      }
    } catch (error) {
      alert('Error: ' + error.message);
    }
  }

  function closeModal() {
    document.getElementById('viewModal').style.display = 'none';
  }

  async function toggleStatus(id, currentStatus) {
    const newStatus = currentStatus === 'active' ? 'inactive' : 'active';
    const confirmMsg = `Change status to ${newStatus}?`;

    if (!confirm(confirmMsg)) return;

    try {
      const formData = new FormData();
      formData.append('id', id);

      const response = await fetch('<?= BASE_URL ?>/api/post-api.php?action=toggle-status', {
        method: 'POST',
        body: formData
      });

      const result = await response.json();

      if (result.success) {
        location.reload();
      } else {
        alert('Error: ' + result.error);
      }
    } catch (error) {
      alert('Error: ' + error.message);
    }
  }

  async function deletePost(id) {
    if (!confirm('Are you sure you want to delete this post? This cannot be undone.')) return;

    try {
      const response = await fetch(`<?= BASE_URL ?>/api/post-api.php?action=delete&id=${id}`, {
        method: 'GET'
      });

      const result = await response.json();

      if (result.success) {
        location.reload();
      } else {
        alert('Error: ' + result.error);
      }
    } catch (error) {
      alert('Error: ' + error.message);
    }
  }

  // Close modal on ESC key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
  });

  // Close modal on overlay click
  document.getElementById('viewModal').addEventListener('click', (e) => {
    if (e.target.id === 'viewModal') closeModal();
  });
</script>

<style>
  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>

<?php
$page_content = ob_get_clean();
include __DIR__ . '/../layouts/admin-layout.php';
?>
