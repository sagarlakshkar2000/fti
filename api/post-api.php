<?php

/**
 * Post API - RESTful endpoints for post management
 */

header('Content-Type: application/json');
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../utils/upload-handler.php';

$action = $_GET['action'] ?? '';

// Handle different actions
switch ($action) {
  case 'create':
    handleCreate();
    break;

  case 'list':
    handleList();
    break;

  case 'get':
    handleGet();
    break;

  case 'update':
    handleUpdate();
    break;

  case 'delete':
    handleDelete();
    break;

  case 'toggle-status':
    handleToggleStatus();
    break;

  default:
    sendError('Invalid action', 400);
}

/**
 * Create new post with images
 */
function handleCreate()
{
  // Require authentication
  requireAuth();

  try {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $status = $_POST['status'] ?? 'active';

    // Validate inputs
    if (empty($title)) {
      sendError('Title is required');
      return;
    }

    // Insert post
    $query = "INSERT INTO posts (title, description, status) VALUES (?, ?, ?)";
    $postId = insertRecord($query, [$title, $description, $status]);

    // Handle image uploads
    if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
      $uploadHandler = new UploadHandler();
      $imageCount = count($_FILES['images']['name']);

      for ($i = 0; $i < $imageCount; $i++) {
        // Prepare file array for single image
        $file = [
          'name' => $_FILES['images']['name'][$i],
          'type' => $_FILES['images']['type'][$i],
          'tmp_name' => $_FILES['images']['tmp_name'][$i],
          'error' => $_FILES['images']['error'][$i],
          'size' => $_FILES['images']['size'][$i]
        ];

        // Upload image
        $result = $uploadHandler->uploadImage($file, $postId, $i + 1);

        if ($result['success']) {
          // Insert image record
          $imgQuery = "INSERT INTO post_images (post_id, image_path, sort_order) VALUES (?, ?, ?)";
          executeQuery($imgQuery, [$postId, $result['path'], $i + 1]);
        } else {
          // Log error but continue
          error_log("Image upload failed: " . $result['error']);
        }
      }
    }

    sendSuccess(['post_id' => $postId, 'message' => 'Post created successfully']);
  } catch (Exception $e) {
    error_log("Create Post Error: " . $e->getMessage());
    sendError('Failed to create post');
  }
}

/**
 * Get list of all posts
 */
function handleList()
{
  try {
    $status = $_GET['status'] ?? null;

    $query = "SELECT p.*,
                         (SELECT image_path FROM post_images WHERE post_id = p.id ORDER BY sort_order LIMIT 1) as thumbnail
                  FROM posts p";

    $params = [];

    if ($status) {
      $query .= " WHERE p.status = ?";
      $params[] = $status;
    }

    $query .= " ORDER BY p.created_at DESC";

    $posts = fetchAll($query, $params);

    sendSuccess(['posts' => $posts]);
  } catch (Exception $e) {
    error_log("List Posts Error: " . $e->getMessage());
    sendError('Failed to fetch posts');
  }
}

/**
 * Get single post with images
 */
function handleGet()
{
  try {
    $id = $_GET['id'] ?? '';

    if (empty($id)) {
      sendError('Post ID is required');
      return;
    }

    // Get post
    $postQuery = "SELECT * FROM posts WHERE id = ?";
    $post = fetchOne($postQuery, [$id]);

    if (!$post) {
      sendError('Post not found', 404);
      return;
    }

    // Get images
    $imagesQuery = "SELECT * FROM post_images WHERE post_id = ? ORDER BY sort_order";
    $images = fetchAll($imagesQuery, [$id]);

    $post['images'] = $images;

    sendSuccess(['post' => $post]);
  } catch (Exception $e) {
    error_log("Get Post Error: " . $e->getMessage());
    sendError('Failed to fetch post');
  }
}

/**
 * Update post
 */
function handleUpdate()
{
  requireAuth();

  try {
    $id = $_POST['id'] ?? '';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $status = $_POST['status'] ?? 'active';

    if (empty($id) || empty($title)) {
      sendError('Post ID and title are required');
      return;
    }

    // Update post
    $query = "UPDATE posts SET title = ?, description = ?, status = ?, updated_at = NOW() WHERE id = ?";
    executeQuery($query, [$title, $description, $status, $id]);

    sendSuccess(['message' => 'Post updated successfully']);
  } catch (Exception $e) {
    error_log("Update Post Error: " . $e->getMessage());
    sendError('Failed to update post');
  }
}

/**
 * Delete post and images
 */
function handleDelete()
{
  requireAuth();

  try {
    $id = $_GET['id'] ?? '';

    if (empty($id)) {
      sendError('Post ID is required');
      return;
    }

    // Delete images from filesystem
    $uploadHandler = new UploadHandler();
    $uploadHandler->deletePostImages($id);

    // Delete post (cascade will delete images from DB)
    $query = "DELETE FROM posts WHERE id = ?";
    executeQuery($query, [$id]);

    sendSuccess(['message' => 'Post deleted successfully']);
  } catch (Exception $e) {
    error_log("Delete Post Error: " . $e->getMessage());
    sendError('Failed to delete post');
  }
}

/**
 * Toggle post status (active/inactive)
 */
function handleToggleStatus()
{
  requireAuth();

  try {
    $id = $_POST['id'] ?? '';

    if (empty($id)) {
      sendError('Post ID is required');
      return;
    }

    // Get current status
    $post = fetchOne("SELECT status FROM posts WHERE id = ?", [$id]);

    if (!$post) {
      sendError('Post not found', 404);
      return;
    }

    // Toggle status
    $newStatus = $post['status'] === 'active' ? 'inactive' : 'active';

    $query = "UPDATE posts SET status = ?, updated_at = NOW() WHERE id = ?";
    executeQuery($query, [$newStatus, $id]);

    sendSuccess(['status' => $newStatus, 'message' => 'Status updated successfully']);
  } catch (Exception $e) {
    error_log("Toggle Status Error: " . $e->getMessage());
    sendError('Failed to toggle status');
  }
}

/**
 * Send JSON success response
 */
function sendSuccess($data)
{
  echo json_encode(['success' => true] + $data);
  exit;
}

/**
 * Send JSON error response
 */
function sendError($message, $code = 400)
{
  http_response_code($code);
  echo json_encode(['success' => false, 'error' => $message]);
  exit;
}
