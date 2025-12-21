<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?? 'Admin Panel' ?> - FTI Travel</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: {
              500: '#f97316',
              600: '#ea580c',
              700: '#c2410c',
            }
          }
        }
      }
    }
  </script>

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Scrollbar Styling */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
      background: #d1d5db;
      border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #9ca3af;
    }

    .dark ::-webkit-scrollbar-track {
      background: #374151;
    }

    .dark ::-webkit-scrollbar-thumb {
      background: #6b7280;
    }
  </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 min-h-screen">
  <!-- Mobile Menu Button -->
  <button id="mobileMenuButton" class="lg:hidden fixed top-4 left-4 z-50 p-3 rounded-lg bg-primary-500 text-white shadow-lg">
    <i class="fas fa-bars text-lg"></i>
  </button>

  <!-- Dark Mode Toggle -->
  <button id="darkModeToggle" class="fixed top-4 right-4 z-50 p-3 rounded-lg bg-gray-800 dark:bg-gray-200 text-white dark:text-gray-800 shadow-lg">
    <i id="darkModeIcon" class="fas fa-moon"></i>
  </button>

  <div class="flex min-h-screen">
    <!-- Sidebar for Desktop -->
    <aside class="hidden lg:flex lg:w-64 flex-col flex-shrink-0 bg-gradient-to-b from-gray-800 to-gray-900 dark:from-gray-900 dark:to-gray-950 text-white shadow-xl">
      <!-- Logo -->
      <div class="p-6 border-b border-gray-700">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-primary-500 to-primary-600 flex items-center justify-center shadow-md">
            <i class="fas fa-suitcase text-white"></i>
          </div>
          <div>
            <h1 class="font-bold text-lg">FTI Admin</h1>
            <p class="text-gray-400 text-xs">Post Management</p>
          </div>
        </div>
      </div>

      <!-- Navigation -->
      <nav class="p-4 flex-grow">
        <ul class="space-y-2">
          <li>
            <a href="manage-posts.php" class="nav-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 <?= basename($_SERVER['PHP_SELF']) === 'manage-posts.php' ? 'bg-primary-900/20 border-l-4 border-primary-500 text-primary-300' : 'hover:bg-gray-700/50 hover:text-primary-300' ?>">
              <i class="fas fa-list mr-3"></i>
              Manage Posts
            </a>
          </li>
          <li>
            <a href="upload-post.php" class="nav-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 <?= basename($_SERVER['PHP_SELF']) === 'upload-post.php' ? 'bg-primary-900/20 border-l-4 border-primary-500 text-primary-300' : 'hover:bg-gray-700/50 hover:text-primary-300' ?>">
              <i class="fas fa-upload mr-3"></i>
              Upload Post
            </a>
          </li>
          <li>
            <a href="../index.php" class="nav-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 hover:bg-gray-700/50 hover:text-primary-300" target="_blank">
              <i class="fas fa-home mr-3"></i>
              View Website
            </a>
          </li>
        </ul>
      </nav>

      <!-- User Info & Logout -->
      <div class="p-4 border-t border-gray-700 bg-gray-800/50">
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-500 to-primary-600 flex items-center justify-center shadow-md">
              <i class="fas fa-user text-white"></i>
            </div>
            <div>
              <p class="text-sm font-medium"><?= getAdminUsername() ?></p>
              <p class="text-gray-400 text-xs">Administrator</p>
            </div>
          </div>
          <a href="../admin-logout.php" class="text-gray-400 hover:text-red-400 transition duration-200" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </div>
      </div>
    </aside>

    <!-- Mobile Sidebar Overlay -->
    <div id="mobileOverlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden"></div>

    <!-- Mobile Sidebar -->
    <aside id="mobileSidebar" class="fixed top-0 left-0 h-full w-64 flex flex-col z-50 bg-gradient-to-b from-gray-800 to-gray-900 text-white shadow-xl transform -translate-x-full lg:hidden transition-transform duration-300">
      <!-- Mobile Logo -->
      <div class="p-6 border-b border-gray-700 flex justify-between items-center">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-primary-500 to-primary-600 flex items-center justify-center">
            <i class="fas fa-suitcase text-white"></i>
          </div>
          <div>
            <h1 class="font-bold text-lg">FTI Admin</h1>
            <p class="text-gray-400 text-xs">Post Management</p>
          </div>
        </div>
        <button id="closeMobileMenu" class="text-gray-400 hover:text-white">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>

      <!-- Mobile Navigation -->
      <nav class="p-4 flex-grow overflow-y-auto">
        <ul class="space-y-2">
          <li>
            <a href="manage-posts.php" class="nav-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 <?= basename($_SERVER['PHP_SELF']) === 'manage-posts.php' ? 'bg-primary-900/20 border-l-4 border-primary-500 text-primary-300' : 'hover:bg-gray-700/50 hover:text-primary-300' ?>">
              <i class="fas fa-list mr-3"></i>
              Manage Posts
            </a>
          </li>
          <li>
            <a href="upload-post.php" class="nav-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 <?= basename($_SERVER['PHP_SELF']) === 'upload-post.php' ? 'bg-primary-900/20 border-l-4 border-primary-500 text-primary-300' : 'hover:bg-gray-700/50 hover:text-primary-300' ?>">
              <i class="fas fa-upload mr-3"></i>
              Upload Post
            </a>
          </li>
          <li>
            <a href="../index.php" class="nav-link flex items-center px-4 py-3 rounded-lg transition-all duration-200 hover:bg-gray-700/50 hover:text-primary-300" target="_blank">
              <i class="fas fa-home mr-3"></i>
              View Website
            </a>
          </li>
        </ul>
      </nav>

      <!-- Mobile User Info -->
      <div class="p-4 border-t border-gray-700 bg-gray-800/50">
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-500 to-primary-600 flex items-center justify-center">
              <i class="fas fa-user text-white"></i>
            </div>
            <div>
              <p class="text-sm font-medium"><?= getAdminUsername() ?></p>
              <p class="text-gray-400 text-xs">Administrator</p>
            </div>
          </div>
          <a href="../admin-logout.php" class="text-gray-400 hover:text-red-400 transition duration-200" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </div>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen lg:ml-0">
      <!-- Header -->
      <header class="bg-white dark:bg-gray-800 shadow-sm px-4 py-4 lg:px-6 lg:ml-0">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
          <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white"><?= $page_title ?? 'Dashboard' ?></h1>
            <p class="text-gray-600 dark:text-gray-300 text-sm mt-1"><?= $page_subtitle ?? '' ?></p>
          </div>
          <div class="flex items-center text-gray-600 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 px-4 py-2 rounded-lg">
            <i class="far fa-calendar mr-2"></i>
            <span id="currentDate"><?= date('F j, Y') ?></span>
          </div>
        </div>
      </header>

      <!-- Content Area -->
      <main class="flex-1 p-4 lg:p-6 overflow-y-auto">
        <?= $page_content ?? '' ?>
      </main>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    // Mobile sidebar toggle
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const closeMobileMenu = document.getElementById('closeMobileMenu');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const darkModeToggle = document.getElementById('darkModeToggle');
    const darkModeIcon = document.getElementById('darkModeIcon');

    mobileMenuButton.addEventListener('click', () => {
      mobileSidebar.classList.remove('-translate-x-full');
      mobileOverlay.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    });

    closeMobileMenu.addEventListener('click', () => {
      mobileSidebar.classList.add('-translate-x-full');
      mobileOverlay.classList.add('hidden');
      document.body.style.overflow = '';
    });

    mobileOverlay.addEventListener('click', () => {
      mobileSidebar.classList.add('-translate-x-full');
      mobileOverlay.classList.add('hidden');
      document.body.style.overflow = '';
    });

    // Dark mode toggle
    darkModeToggle.addEventListener('click', () => {
      if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        darkModeIcon.classList.remove('fa-sun');
        darkModeIcon.classList.add('fa-moon');
        localStorage.setItem('theme', 'light');
      } else {
        document.documentElement.classList.add('dark');
        darkModeIcon.classList.remove('fa-moon');
        darkModeIcon.classList.add('fa-sun');
        localStorage.setItem('theme', 'dark');
      }
    });

    // Check for saved theme preference
    if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
      darkModeIcon.classList.remove('fa-moon');
      darkModeIcon.classList.add('fa-sun');
    }

    // Handle window resize
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1024) {
        mobileSidebar.classList.add('-translate-x-full');
        mobileOverlay.classList.add('hidden');
        document.body.style.overflow = '';
      }
    });
  </script>

  <!-- Page Scripts -->
  <?= $custom_js ?? '' ?>
</body>

</html>
