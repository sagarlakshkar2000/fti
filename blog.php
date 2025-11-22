<?php
// Define ROOT_PATH as the filesystem path to your project root
define('ROOT_PATH', __DIR__);

// Include assets
$assets = include ROOT_PATH . '/config/assetsHandler.php';

// Load blog data (make sure data/blog.php returns an array)
$blogs = include ROOT_PATH . '/data/blog.php';

// Get slug from URL
$slug = $_GET['slug'] ?? null;

// -----------------------
// Show blog listing page
// -----------------------
if (!$slug) {
  $page_title = "Discover New Adventures";
  $page_description = "Explore latest blogs from Famous Tours India.";

  ob_start();
?>
  <!-- Breadcrumb Section -->
  <section class="bg-gradient-to-r from-orange-600 to-amber-500 py-14">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center gap-2 text-white text-sm">
        <a href="/fti/index" class="hover:text-orange-200 transition duration-300">
          <i class="fas fa-home"></i> Home
        </a>
        <i class="fas fa-chevron-right text-xs"></i>
        <span class="text-orange-200 font-semibold">Blog</span>
      </div>
      <h3 class="text-3xl md:text-4xl font-bold text-white mt-4">Discover New Adventures</h3>
      <p class="text-orange-100 text-lg mt-2">Latest Travel Blogs</p>
    </div>
  </section>

  <section class="bg-white py-10">
    <div class="px-8 mx-auto max-w-screen-xl grid gap-10 sm:grid-cols-2 lg:grid-cols-3">

      <?php foreach ($blogs as $key => $blog): ?>
        <div class="relative">
          <a href="<?php echo BASE_URL; ?>/blog/<?php echo $key; ?>" class="block overflow-hidden group rounded-xl shadow-lg">
            <img src="<?php echo $blog['image']; ?>" class="object-cover w-full h-56 sm:h-64 transition-all duration-300 ease-out group-hover:scale-110">
          </a>
          <div class="mt-5">
            <p class="uppercase font-semibold text-xs mb-2.5 text-purple-600"><?= $blog['date'] ?></p>
            <a href="<?php echo BASE_URL; ?>/blog/<?php echo $key; ?>" class="block mb-3 hover:underline">
              <h2 class="text-2xl font-bold text-black hover:text-purple-700 transition-colors duration-200">
                <?= $blog['title'] ?>
              </h2>
            </a>
            <p class="mb-4 text-gray-700"><?= $blog['description'] ?></p>
            <a href="<?php echo BASE_URL; ?>/blog/<?php echo $key; ?>" class="font-medium underline text-purple-600">Read More</a>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </section>
<?php
  $page_content = ob_get_clean();
  include ROOT_PATH . '/layouts/main.php';
  exit;
}

// -----------------------
// Show single blog page
// -----------------------
if (!isset($blogs[$slug])) {
  echo "Blog Not Found";
  exit;
}

$data = $blogs[$slug];
include ROOT_PATH . '/pages/blog-template.php';
