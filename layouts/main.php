<?php
// Default values for SEO
$default_title = "My Website - Modern PHP Platform";
$default_description = "Experience our modern PHP-based website with cutting-edge features.";
$default_keywords = "php, modern, website";
$default_canonical = "https://example.com";

// Set defaults if not provided
$page_title = $page_title ?? $default_title;
$page_description = $page_description ?? $default_description;
$page_keywords = $page_keywords ?? $default_keywords;
$page_canonical = $page_canonical ?? $default_canonical;

// Initialize custom assets if not set
$custom_css = $custom_css ?? '';
$custom_js = $custom_js ?? '';
$head_scripts = $head_scripts ?? ''; // For scripts that need to be in head
$body_scripts = $body_scripts ?? ''; // For scripts before </body>

// Additional meta tags array
$additional_meta = $additional_meta ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($page_title) ?></title>

  <!-- Basic SEO Meta -->
  <meta name="description" content="<?= htmlspecialchars($page_description) ?>" />
  <meta name="keywords" content="<?= htmlspecialchars($page_keywords) ?>" />
  <link rel="canonical" href="<?= htmlspecialchars($page_canonical) ?>" />

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>" />
  <meta property="og:description" content="<?= htmlspecialchars($page_description) ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?= htmlspecialchars($page_canonical) ?>" />
  <meta property="og:image" content="<?= $og_image ?? 'https://www.ftitravel.com/assets/images/og-default.jpg' ?>" />

  <!-- Additional Meta Tags -->
  <?php foreach ($additional_meta as $meta): ?>
    <?= $meta . "\n" ?>
  <?php endforeach; ?>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="/assets/images/favicon.png" />

  <!-- FontAwesome 7 -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/fontawesome.min.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/solid.min.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/regular.min.css" />

  <!-- Tailwind CSS v4 CDN Config -->
  <script>
    tailwind = {
      config: {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {
              primary: '#3a86ff',
              secondary: '#ff006e',
              dark: '#1a1a2e',
              light: '#f8f9fa',
              accent: '#8338ec',
              yellow: 'hsl(45, 100%, 51%)',
            },
            fontFamily: {
              main: ['Poppins', 'sans-serif'],
            },
            borderRadius: {
              DEFAULT: '8px',
            },
            backgroundImage: {
              gradient: 'linear-gradient(135deg, hsl(12,80%,23%), hsl(24,100%,41%))',
              gradient1: 'linear-gradient(135deg, hsl(12,80%,23%), hsl(39,97%,87%))',
            },
          },
        },
      },
    };
  </script>

  <!-- Tailwind via CDN -->
  <script defer src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <!-- Custom Stylesheet -->
  <?php include __DIR__ . '/../includes/stylesheet.php'; ?>

  <!-- Page-specific CSS -->
  <?= $custom_css ?>

  <!-- Head Scripts (Analytics, etc.) -->
  <?php include __DIR__ . '/../includes/analytics.php'; ?>
  <?= $head_scripts ?>
</head>

<body class="bg-white text-gray-800 scroll-smooth transition-all duration-300 font-main">
  <?php include __DIR__ . '/../includes/header.php'; ?>

  <main class="min-h-screen">
    <?= $page_content ?? '<!-- No content provided -->' ?>
  </main>

  <?php include __DIR__ . '/../includes/footer.php'; ?>

  <!-- Page-specific JS -->
  <?= $custom_js ?>
  <?= $body_scripts ?>
</body>

</html>
