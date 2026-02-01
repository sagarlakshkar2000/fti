@props(['taxiServices', 'serviceIcons'])

<section class="taxi-services bg-white md:px-4 py-12 md:py-16 lg:py-20">
    <div class="container mx-auto px-4 sm:px-6">
        <!-- Section Header -->
        <div class="text-center mb-12 lg:mb-16 max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Our Taxi Services
            </h2>
            <p class="text-lg md:text-xl text-gray-600 leading-relaxed">
                Reliable and convenient rides for all your needs with premium comfort and safety
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            <?php foreach ($taxiServices as $index => $service):
                // Safe icon fallback
                $iconClass = $serviceIcons[$index] ?? 'fa-car';
            ?>
                <div class="group relative bg-white rounded-2xl p-6 lg:p-8 shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 hover:border-orange-200">
                    <!-- Background Gradient Effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <!-- Content -->
                    <div class="relative z-10 flex flex-col items-center text-left md:text-center">
                        <div class="w-full flex flex-row justify-start items-center gap-x-6 ">
                            <!-- Icon -->
                            <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-amber-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="fa <?= htmlspecialchars($iconClass) ?> text-white text-2xl"></i>
                            </div>

                            <!-- Title -->
                            <h3 class="text-4xl lg:text-2xl font-bold text-gray-900 mb-4 group-hover:text-orange-700 transition-colors duration-300">
                                <?= htmlspecialchars($service['title'] ?? '') ?>
                            </h3>
                        </div>


                        <!-- Description -->
                        <p class="text-gray-600 leading-relaxed text-sm lg:text-base">
                            <?= htmlspecialchars($service['description'] ?? '') ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
