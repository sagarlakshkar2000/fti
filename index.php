<?php
include('utils/info.php');

// Page specific SEO
$page_title = "FTI Travel | Explore Best Travel Packages";
$page_description = "Book your dream travel package with FTI Travel. Affordable trips, luxury vacations, and adventure tours worldwide.";
$page_keywords = "travel, tour packages, holidays, vacations, FTI Travel";
$page_canonical = "https://www.famoustoursindia.com/";

// Read JSON data
$jsonData = file_get_contents('./utils/data/cars.json');
$jsonDecodedData = json_decode($jsonData, true);
$tourPackages = $jsonDecodedData['cars_section']['tourPackages'];

// Page content
ob_start();
?>

<!-- Include All Sections -->
<?php include './components/hero.php'; ?>
<?php include './components/taxi-services.php'; ?>
<?php include './components/fleet.php'; ?>

<?php include './components/airport-railway.php'; ?>
<?php include './components/rajasthan-tours.php'; ?>

<?php
$page_content = ob_get_clean();
include './layouts/main.php';
?>
