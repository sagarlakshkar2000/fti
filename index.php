<?php
include('utils/info.php');

// Page specific SEO
$page_title = "FTI Travel Jaipur | Best Rajasthan Taxi & Tour Packages - Famous Tours India";
$page_description = "Famous Tours India offers trusted taxi and travel packages in Jaipur & Rajasthan—airport pickup, sightseeing tours, Golden Triangle, and budget-friendly car rentals.";
$page_keywords = "Jaipur taxi service, Rajasthan tour packages, Golden Triangle tour, cab booking Jaipur, airport taxi Jaipur, Khatu Shyam Ji taxi, Salasar Balaji tour, luxury car rental Jaipur, Rajasthan sightseeing, Jaipur to Agra cab, Jaipur to Delhi taxi, best travel agency Jaipur, city rides Jaipur, outstation trips Rajasthan";
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
