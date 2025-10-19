<?php include 'includes/seo.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($page_keywords) ?>">
    <link rel="canonical" href="<?= $page_canonical ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($page_description) ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $page_canonical ?>">
    <meta property="og:image" content="https://www.ftitravel.com/assets/images/og-default.jpg">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">

    <?php include 'includes/stylessheet.php'; ?>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <!-- Page Content Start -->
    <main class="container-fluid p-0">
        <?php if (isset($page_content))
            echo $page_content; ?>
    </main>
    <!-- Page Content End -->

    <?php include 'includes/footer.php'; ?>
</body>

</html>