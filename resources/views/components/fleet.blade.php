@php
$phone = '+911234567890';

// Section data
$fleetData = [
"title" => "Choose your Taxi to Hire",
"description" => "Choose from a wide selection of vehicles, perfect for your travel preferences and budget needs.",
"cars" => [
[
"name" => "Swift Desire",
"image" => "/assets/images/swift-desire-fti.png",
"link" => "/swift-dzire-car-hire-in-jaipur",
"rating" => 4.0,
"reviews" => 1389,
"specifications" => [
"seating_capacity" => "4 Person",
"air_conditioning" => "Yes"
],
"whatsapp_link" => "text=Hi%20Quick%20Cab%20Services%20Jaipur!%20I%20am%20interested%20in%20booking%20a%20car.%20Car%20Name=>%20Swift%20Desire.%20Please%20let%20me%20know%20the%20availability."
],
[
"name" => "Hyundai Aura",
"image" => "/assets/images/hyundai-aura-fti.jpg",
"link" => "/hyundai-aura-car-hire-in-jaipur",
"rating" => 4.5,
"reviews" => 125,
"specifications" => [
"seating_capacity" => "4 Person",
"air_conditioning" => "Yes"
],
"whatsapp_link" => "text=Hi%20Quick%20Cab%20Services%20Jaipur!%20I%20am%20interested%20in%20booking%20a%20car.%20Car%20Name=>%20Hyundai%20Aura.%20Please%20let%20me%20know%20the%20availability."
],
[
"name" => "Toyota Etios",
"image" => "/assets/images/toyota-etios-fti.png",
"link" => "/toyota-etios-car-rental-in-jaipur",
"rating" => 4.0,
"reviews" => 173,
"specifications" => [
"seating_capacity" => "4 Person",
"air_conditioning" => "Yes"
],
"whatsapp_link" => "text=Hi%20Quick%20Cab%20Services%20Jaipur!%20I%20am%20interested%20in%20booking%20a%20car.%20Car%20Name=>%Toyota%Etios.%20Please%20let%20me%20know%20the%20availability."
],
[
"name" => "Maruti Ciaz",
"image" => "/assets/images/maruti-ciaz-fti.jpg",
"link" => "/maruti-ciaz-car-rental-in-jaipur",
"rating" => 4.0,
"reviews" => 78,
"specifications" => [
"seating_capacity" => "4 Person",
"air_conditioning" => "Yes"
],
"whatsapp_link" => "text=Hi%20Quick%20Cab%20Services%20Jaipur!%20I%20am%20interested%20in%20booking%20a%20car.%20Car%20Name=>%20Maruti%20Ciaz.%20Please%20let%20me%20know%20the%20availability."
],
[
"name" => "Maruti Ertiga",
"image" => "/assets/images/maruti-ertiga-2-fti.png",
"link" => "/ertiga-car-rental-in-jaipur",
"rating" => 4.0,
"reviews" => 724,
"specifications" => [
"seating_capacity" => "6 Person",
"air_conditioning" => "Yes"
],
"whatsapp_link" => "text=Hi%20Quick%20Cab%20Services%20Jaipur!%20I%20am%20interested%20in%20booking%20a%20car.%20Car%20Name=>%20Maruti%20Ertiga.%20Please%20let%20me%20know%20the%20availability."
],
[
"name" => "Kia Carens",
"image" => "/assets/images/kia-carens-fti.png",
"link" => "/kia-carens-car-rental-in-jaipur",
"rating" => 4.5,
"reviews" => 246,
"specifications" => [
"seating_capacity" => "6 Person",
"air_conditioning" => "Yes"
],
"whatsapp_link" => "text=Hi%20Quick%20Cab%20Services%20Jaipur!%20I%20am%20interested%20in%20booking%20a%20car.%20Car%20Name=>%20Kia%20Carens.%20Please%20let%20me%20know%20the%20availability."
],
[
"name" => "Innova",
"image" => "/assets/images/innova-1-fti.png",
"link" => "/innova-car-rental-in-jaipur",
"rating" => 4.0,
"reviews" => 1078,
"specifications" => [
"seating_capacity" => "6 Person",
"air_conditioning" => "Yes"
],
"whatsapp_link" => "text=Hi%20Quick%20Cab%20Services%20Jaipur!%20I%20am%20interested%20in%20booking%20a%20car.%20Car%20Name=>%20Toyota%20Innova.%20Please%20let%20me%20know%20the%20availability."
],
[
"name" => "Innova Crysta",
"image" => "/assets/images/Innova-Crysta-fti.png",
"link" => "/innova-crysta-car-rental-in-jaipur",
"rating" => 4.0,
"reviews" => 2724,
"specifications" => [
"seating_capacity" => "6 Person",
"air_conditioning" => "Yes"
],
"whatsapp_link" => "text=Hi%20Quick%20Cab%20Services%20Jaipur!%20I%20am%20interested%20in%20booking%20a%20car.%20Car%20Name=>%Innova%Crysta.%20Please%20let%20me%20know%20the%20availability."
],
[
"name" => "Innova Hycross",
"image" => "/assets/images/Innova-Hycross-fti.jpg",
"link" => "/innova-hycross-car-rental-in-jaipur",
"rating" => 4.0,
"reviews" => 817,
"specifications" => [
"seating_capacity" => "6 Person",
"air_conditioning" => "Yes"
],
"whatsapp_link" => "text=Hi%20Quick%20Cab%20Services%20Jaipur!%20I%20am%20interested%20in%20booking%20a%20car.%20Car%20Name=>%Innova%Hycross.%20Please%20let%20me%20know%20the%20availability."
]
]
];
@endphp


<!-- Start Travel Fleet Section -->
<section class="py-12 md:px-4 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12 max-w-3xl mx-auto">
            <h2 class="text-2xl md:text-4xl font-bold text-gray-900 mb-3"><?= $fleetData['title'] ?></h2>
            <p class="text-gray-600 text-lg md:text-xl"><?= $fleetData['description'] ?></p>
        </div>

        <!-- Fleet Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($fleetData['cars'] as $fleet): ?>
                <?php
                // Dynamic WhatsApp message
                $message = "Hello Famous Tours India Taxi Service Jaipur! 👋\n"
                    . "I’m interested in booking a car.\n\n"
                    . "🚗 Car Name: {$fleet['name']}\n"
                    . "👥 Seating Capacity: {$fleet['specifications']['seating_capacity']}\n"
                    . "❄️ Air Conditioning: {$fleet['specifications']['air_conditioning']}\n\n"
                    . "Please let me know the availability and fare details.";

                $urlMessage = urlencode($message);
                ?>

                <div class="bg-white rounded-xl border-2 border-orange-500 hover:border-orange-500 shadow-xs hover:shadow-xs transition-transform transform flex flex-col overflow-hidden">
                    <!-- Car Image -->
                    <div class="relative w-full h-72 md:h-62 w-full overflow-hidden">
                        <img src="<?= $fleet['image'] ?>" alt="<?= $fleet['name'] ?>" class="w-full h-full object-contain md:object-cover md:transition-transform md:duration-300 md:hover:scale-105">
                        <!-- Rating Badge -->
                        <div class="absolute top-2 right-2 bg-yellow-400 text-gray-900 px-3 py-1 rounded-full text-sm font-semibold flex items-center gap-1 shadow">
                            <i class="fa-solid fa-star text-gray-900"></i>
                            <span><?= $fleet['rating'] ?? 'N/A' ?></span>
                        </div>
                    </div>

                    <!-- Car Content -->
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="text-lg md:text-xl font-semibold text-orange-600 mb-2"><?= $fleet['name'] ?></h3>

                        <!-- Specs -->
                        <div class="flex flex-wrap gap-3 text-gray-600 text-sm mb-4">
                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-group text-orange-500"></i> <?= $fleet['specifications']['seating_capacity'] ?? 'N/A' ?></div>
                            <div class="flex items-center gap-1"><i class="fa-solid fa-snowflake text-blue-500"></i> <?= $fleet['specifications']['air_conditioning'] ?? 'N/A' ?></div>
                        </div>

                        <!-- Book Now Button -->
                        <a href="https://wa.me/<?= $phone ?>?text=<?= $urlMessage ?>" target=" _blank" class="mt-auto inline-flex items-center justify-center gap-2 bg-gradient-to-r from-orange-500 to-amber-400 text-white px-4 py-2 rounded-lg font-medium hover:from-orange-600 hover:to-amber-500 transition">
                            <i class="fa-brands fa-whatsapp"></i> Book Now
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
