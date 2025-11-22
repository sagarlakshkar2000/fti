<?php
// Only define ROOT_PATH if not already defined
if (!defined('ROOT_PATH')) {
  define('ROOT_PATH', __DIR__); // or the proper root path
}


// Detect if running on localhost
$isLocal = in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1']);

// Local project folder name (change only here if needed)
$projectFolder = "fti"; // your local folder name

// BASE_URL auto setup
if ($isLocal) {
  if (!defined('BASE_URL')) {
    define("BASE_URL", "http://localhost/" . $projectFolder);
  }
} else {
  // Auto detect live domain
  if (!defined('BASE_URL')) {
    define("BASE_URL", "https://" . $_SERVER['SERVER_NAME']);
  }
}
