<?php

/**
 * Image Upload Handler Utility
 * Handles image validation, upload, and thumbnail generation
 */

class UploadHandler
{

  // Allowed file types
  private $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
  private $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

  // Max file size (5MB)
  private $maxFileSize = 5 * 1024 * 1024;

  // Upload directory
  private $uploadDir = __DIR__ . '/../public/assets/uploads/posts/';

  /**
   * Validate uploaded image
   * @param array $file $_FILES array element
   * @return array ['success' => bool, 'error' => string]
   */
  public function validateImage($file)
  {
    // Check if file was uploaded
    if (!isset($file['tmp_name']) || empty($file['tmp_name'])) {
      return ['success' => false, 'error' => 'No file uploaded'];
    }

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
      return ['success' => false, 'error' => 'Upload error occurred'];
    }

    // Check file size
    if ($file['size'] > $this->maxFileSize) {
      return ['success' => false, 'error' => 'File size exceeds 5MB limit'];
    }

    // Check MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mimeType, $this->allowedTypes)) {
      return ['success' => false, 'error' => 'Invalid file type. Only JPG, PNG, and WebP allowed'];
    }

    // Check file extension
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, $this->allowedExtensions)) {
      return ['success' => false, 'error' => 'Invalid file extension'];
    }

    return ['success' => true, 'error' => null];
  }

  /**
   * Upload image and create thumbnail
   * @param array $file $_FILES array element
   * @param int $postId Post ID
   * @param int $index Image index
   * @return array ['success' => bool, 'path' => string, 'error' => string]
   */
  public function uploadImage($file, $postId, $index = 1)
  {
    // Validate image
    $validation = $this->validateImage($file);
    if (!$validation['success']) {
      return $validation;
    }

    // Create post directory if doesn't exist
    $postDir = $this->uploadDir . "post-{$postId}/";
    if (!is_dir($postDir)) {
      mkdir($postDir, 0755, true);
    }

    // Generate unique filename
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $filename = "image-{$index}.{$extension}";
    $filepath = $postDir . $filename;

    // Move uploaded file
    if (!move_uploaded_file($file['tmp_name'], $filepath)) {
      return ['success' => false, 'error' => 'Failed to move uploaded file', 'path' => null];
    }

    // Optimize image (resize if too large)
    $this->optimizeImage($filepath, $extension);

    // Create thumbnail
    $this->createThumbnail($filepath, $postDir . "thumb-{$index}.{$extension}");

    // Return relative path
    $relativePath = "/fti/public/assets/uploads/posts/post-{$postId}/{$filename}";

    return ['success' => true, 'error' => null, 'path' => $relativePath];
  }

  /**
   * Optimize image (resize if dimensions are too large)
   * @param string $filepath Full path to image
   * @param string $extension File extension
   */
  private function optimizeImage($filepath, $extension)
  {
    $maxWidth = 1920;
    $maxHeight = 1080;

    list($width, $height) = getimagesize($filepath);

    // Skip if image is already smaller
    if ($width <= $maxWidth && $height <= $maxHeight) {
      return;
    }

    // Calculate new dimensions
    $ratio = min($maxWidth / $width, $maxHeight / $height);
    $newWidth = intval($width * $ratio);
    $newHeight = intval($height * $ratio);

    // Create image resource
    switch ($extension) {
      case 'jpg':
      case 'jpeg':
        $source = imagecreatefromjpeg($filepath);
        break;
      case 'png':
        $source = imagecreatefrompng($filepath);
        break;
      case 'webp':
        $source = imagecreatefromwebp($filepath);
        break;
      default:
        return;
    }

    if (!$source) return;

    // Create new image
    $newImage = imagecreatetruecolor($newWidth, $newHeight);

    // Preserve transparency for PNG and WebP
    if ($extension === 'png' || $extension === 'webp') {
      imagealphablending($newImage, false);
      imagesavealpha($newImage, true);
    }

    // Resize
    imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    // Save
    switch ($extension) {
      case 'jpg':
      case 'jpeg':
        imagejpeg($newImage, $filepath, 85);
        break;
      case 'png':
        imagepng($newImage, $filepath, 8);
        break;
      case 'webp':
        imagewebp($newImage, $filepath, 85);
        break;
    }

    // Clean up
    imagedestroy($source);
    imagedestroy($newImage);
  }

  /**
   * Create thumbnail
   * @param string $source Source image path
   * @param string $destination Thumbnail destination path
   */
  private function createThumbnail($source, $destination)
  {
    $thumbWidth = 300;
    $thumbHeight = 200;

    list($width, $height) = getimagesize($source);
    $extension = strtolower(pathinfo($source, PATHINFO_EXTENSION));

    // Create source image
    switch ($extension) {
      case 'jpg':
      case 'jpeg':
        $sourceImage = imagecreatefromjpeg($source);
        break;
      case 'png':
        $sourceImage = imagecreatefrompng($source);
        break;
      case 'webp':
        $sourceImage = imagecreatefromwebp($source);
        break;
      default:
        return;
    }

    if (!$sourceImage) return;

    // Create thumbnail
    $thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);

    // Preserve transparency
    if ($extension === 'png' || $extension === 'webp') {
      imagealphablending($thumb, false);
      imagesavealpha($thumb, true);
    }

    // Resize
    imagecopyresampled($thumb, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);

    // Save thumbnail
    switch ($extension) {
      case 'jpg':
      case 'jpeg':
        imagejpeg($thumb, $destination, 80);
        break;
      case 'png':
        imagepng($thumb, $destination, 8);
        break;
      case 'webp':
        imagewebp($thumb, $destination, 80);
        break;
    }

    // Clean up
    imagedestroy($sourceImage);
    imagedestroy($thumb);
  }

  /**
   * Delete post images
   * @param int $postId Post ID
   * @return bool
   */
  public function deletePostImages($postId)
  {
    $postDir = $this->uploadDir . "post-{$postId}/";

    if (!is_dir($postDir)) {
      return false;
    }

    // Delete all files in directory
    $files = glob($postDir . '*');
    foreach ($files as $file) {
      if (is_file($file)) {
        unlink($file);
      }
    }

    // Remove directory
    return rmdir($postDir);
  }
}
