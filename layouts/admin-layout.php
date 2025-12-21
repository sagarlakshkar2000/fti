<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?? 'Admin Panel' ?> - FTI Travel</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

  <style>
    body {
      background: #f3f4f6;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .sidebar {
      background: linear-gradient(180deg, #1f2937 0%, #111827 100%);
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
      transition: all 0.3s ease;
      color: #9ca3af;
    }

    .nav-link:hover,
    .nav-link.active {
      background: rgba(249, 115, 22, 0.1);
      color: #fa7d1a;
      border-left: 4px solid #fa7d1a;
    }

    .header-card {
      background: white;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="sidebar w-64 flex-shrink-0 overflow-y-auto">
      <!-- Logo -->
      <div class="p-6 border-b border-gray-700">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center">
            <i class="fas fa-suitcase text-white"></i>
          </div>
          <div>
            <h1 class="text-white font-bold text-lg">FTI Admin</h1>
            <p class="text-gray-400 text-xs">Dashboard</p>
          </div>
        </div>
      </div>

      <!-- Navigation -->
      <nav class="p-4">
        <ul class="space-y-2">
          <li>
            <a href="manage-posts.php" class="nav-link flex items-center px-4 py-3 rounded-lg <?= basename($_SERVER['PHP_SELF']) === 'manage-posts.php' ? 'active' : '' ?>">
              <i class="fas fa-list mr-3"></i>
              Manage Posts
            </a>
          </li>
          <li>
            <a href="upload-post.php" class="nav-link flex items-center px-4 py-3 rounded-lg <?= basename($_SERVER['PHP_SELF']) === 'upload-post.php' ? 'active' : '' ?>">
              <i class="fas fa-upload mr-3"></i>
              Upload Post
            </a>
          </li>
          <li>
            <a href="../index.php" class="nav-link flex items-center px-4 py-3 rounded-lg" target="_blank">
              <i class="fas fa-home mr-3"></i>
              View Website
            </a>
          </li>
        </ul>
      </nav>

      <!-- User Info & Logout -->
      <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-700 bg-gray-900">
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-3">
            <div class="w-8 h-8 rounded-full bg-orange-600 flex items-center justify-center">
              <i class="fas fa-user text-white text-sm"></i>
            </div>
            <div>
              <p class="text-white text-sm font-medium"><?= getAdminUsername() ?></p>
              <p class="text-gray-400 text-xs">Administrator</p>
            </div>
          </div>
          <a href="../admin-logout.php" class="text-gray-400 hover:text-red-400 transition" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </div>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
      <!-- Header -->
      <header class="header-card px-6 py-4">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="text-2xl font-bold text-gray-800"><?= $page_title ?? 'Dashboard' ?></h2>
            <p class="text-gray-600 text-sm"><?= $page_subtitle ?? '' ?></p>
          </div>
          <div class="text-sm text-gray-600">
            <i class="far fa-calendar mr-2"></i>
            <?= date('F j, Y') ?>
          </div>
        </div>
      </header>

      <!-- Content Area -->
      <main class="flex-1 overflow-y-auto p-6">
        <?= $page_content ?? '' ?>
      </main>
    </div>
  </div>

  <!-- Page Scripts -->
  <?= $custom_js ?? '' ?>
</body>

</html>
