<?php
$page_title = $data['title'];
$page_description = $data['description'];

ob_start();
?>

<section class="py-10 container mx-auto px-6">
  <h1 class="text-4xl font-bold mb-3"><?= $data['title']; ?></h1>
  <p class="text-gray-600 mb-8">Published on <?= $data['date']; ?></p>

  <div class="prose max-w-none">
    <?= $data['content']; ?>
  </div>
</section>

<?php
$page_content = ob_get_clean();
include ROOT_PATH . '/layouts/main.php';
?>
