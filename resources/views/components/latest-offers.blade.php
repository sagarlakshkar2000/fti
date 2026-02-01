@props(['latestOffers' => []])

@if(count($latestOffers) > 0)
<!-- Add Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<div id="offers-modal" class="fixed inset-0 z-[100] hidden" role="dialog" aria-modal="true">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/50 transition-opacity" aria-hidden="true" onclick="closeOffersModal()"></div>

    <!-- Modal Panel -->
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative w-full max-w-4xl transform overflow-hidden rounded-2xl bg-black shadow-2xl transition-all sm:my-8 border border-white/10">

            <!-- Close Button -->
            <button type="button" onclick="closeOffersModal()"
                class="absolute right-4 top-4 z-30 rounded-full bg-black/20 text-white p-2 hover:bg-black/40 backdrop-blur-md border border-white/10 transition-all">
                <span class="sr-only">Close</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Swiper Container -->
            <div class="swiper offers-swiper h-[85vh] w-full">
                <div class="swiper-wrapper">
                    @foreach($latestOffers as $offer)
                    <div class="swiper-slide relative flex items-center justify-center overflow-hidden bg-black">
                        <!-- Blurred Background Layer -->
                        <div class="absolute inset-0 z-0">
                            <img src="{{ $offer['image'] }}" class="h-full w-full object-cover opacity-50 blur-xl scale-110" alt="Background">
                            <div class="absolute inset-0 bg-black/30"></div>
                        </div>

                        <!-- Main Image Container -->
                        <div class="relative z-10 h-full w-full p-4 md:p-8 flex items-center justify-center pb-32">
                            @if(isset($offer['link']))
                            <a href="{{ $offer['link'] }}" class="relative block h-full w-full max-h-full max-w-full flex items-center justify-center group">
                                <img src="{{ $offer['image'] }}"
                                    alt="{{ $offer['title'] }}"
                                    class="max-h-full max-w-full object-contain rounded-lg shadow-2xl group-hover:scale-[1.02] transition-transform duration-500">
                            </a>
                            @else
                            <img src="{{ $offer['image'] }}"
                                alt="{{ $offer['title'] }}"
                                class="max-h-full max-w-full object-contain rounded-lg shadow-2xl">
                            @endif
                        </div>

                        <!-- Text Overlay -->
                        <div class="absolute inset-x-0 bottom-0 z-20 bg-gradient-to-t from-black via-black/80 to-transparent pt-20 pb-8 px-6 md:px-12 text-left">
                            <div class="max-w-3xl mx-auto space-y-3">
                                <!-- Tags -->
                                @if(isset($offer['discount']) || isset($offer['type']))
                                <div class="flex flex-wrap gap-2 mb-2">
                                    @if(isset($offer['discount']))
                                    <span class="inline-flex items-center rounded-full bg-red-600/90 px-3 py-1 text-xs font-bold text-white shadow-sm backdrop-blur-sm">
                                        {{ $offer['discount'] }}% OFF
                                    </span>
                                    @endif
                                    @if(isset($offer['type']))
                                    <span class="inline-flex items-center rounded-full bg-white/20 px-3 py-1 text-xs font-medium text-white shadow-sm backdrop-blur-md border border-white/10">
                                        {{ $offer['type'] }}
                                    </span>
                                    @endif
                                </div>
                                @endif

                                <h3 class="text-2xl md:text-3xl font-bold text-white leading-tight tracking-tight drop-shadow-sm">
                                    {{ $offer['title'] }}
                                </h3>

                                @if(isset($offer['description']))
                                <p class="text-gray-200 text-sm md:text-base line-clamp-2 leading-relaxed max-w-2xl">
                                    {{ $offer['description'] }}
                                </p>
                                @endif

                                @if(isset($offer['link']))
                                <div class="pt-2">
                                    <a href="{{ $offer['link'] }}" class="inline-flex items-center text-sm font-semibold text-white hover:text-blue-300 transition-colors">
                                        View Details
                                        <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Navigation Controls -->
                @if(count($latestOffers) > 1)
                <div class="absolute bottom-6 right-6 z-30 flex items-center gap-3">
                    <button class="swiper-button-prev !static !m-0 flex items-center justify-center !w-10 !h-10 rounded-full bg-white/10 hover:bg-white/20 text-white backdrop-blur-md border border-white/20 transition-all !after:content-['']">
                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <button class="swiper-button-next !static !m-0 flex items-center justify-center !w-10 !h-10 rounded-full bg-white/10 hover:bg-white/20 text-white backdrop-blur-md border border-white/20 transition-all !after:content-['']">
                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination !bottom-8 !left-6 !right-auto !w-auto"></div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Add Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    let offersSwiper = null;
    let timeoutId = null;

    function openOffersModal() {
        const modal = document.getElementById('offers-modal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            if (offersSwiper) {
                offersSwiper.autoplay.start();
            }
        }
    }

    function closeOffersModal() {
        const modal = document.getElementById('offers-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            if (offersSwiper) {
                offersSwiper.autoplay.stop();
            }
        }
    }

    function updateCounter(swiper) {
        const currentIndexEl = document.querySelector('.swiper-current-index');
        if (currentIndexEl) {
            const realIndex = swiper.realIndex + 1;
            currentIndexEl.textContent = realIndex;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('offers-modal');
        const swiperEl = document.querySelector('.offers-swiper');

        if (modal && swiperEl) {
            offersSwiper = new Swiper('.offers-swiper', {
                loop: false,
                speed: 400,
                autoplay: {
                    delay: 10000, // 10 seconds
                    disableOnInteraction: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                on: {
                    init: function() {
                        // Show modal after delay
                        timeoutId = setTimeout(() => {
                            openOffersModal();
                        }, 2000);

                        updateCounter(this);
                    },
                    slideChange: function() {
                        updateCounter(this);
                    }
                },
            });

            // Close modal when clicking outside
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeOffersModal();
                }
            });
        }
    });

    // Close on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeOffersModal();
        }
    });

    // Clean up
    window.addEventListener('beforeunload', () => {
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
    });
</script>

<style>
    /* Simple Swiper Styles */
    .swiper-button-next::after,
    .swiper-button-prev::after {
        content: none !important;
    }

    .swiper-slide {
        height: auto;
    }

    .swiper-pagination-bullet-active {
        width: 20px;
        border-radius: 4px;
    }

    /* Modal Animation */
    #offers-modal .swiper {
        animation: fadeIn 0.3s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>

<style>
    body.overflow-hidden {
        overflow: hidden;
    }
</style>

@endif
