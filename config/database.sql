-- Database schema for FTI Post Upload System
-- Run this file to create necessary tables

-- Create database (if not exists)
CREATE DATABASE IF NOT EXISTS fti_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE fti_db;

-- Posts table
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_status (status),
    INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Post images table
CREATE TABLE IF NOT EXISTS post_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    image_path VARCHAR(500) NOT NULL,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    INDEX idx_post_id (post_id),
    INDEX idx_sort_order (sort_order)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample post for testing
INSERT INTO posts (title, description, status) VALUES
('Welcome to Famous Tours India!', 'Discover the beauty of Rajasthan with our exclusive tour packages. Book your Golden Triangle tour today!', 'active');

-- Insert sample images for the test post
INSERT INTO post_images (post_id, image_path, sort_order) VALUES
(1, '/fti/public/assets/uploads/posts/post-1/image-1.jpg', 1),
(1, '/fti/public/assets/uploads/posts/post-1/image-2.jpg', 2);
