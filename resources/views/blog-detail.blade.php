@extends('layouts.app')

@section('title', $title)
@section('meta_description', $meta_description)

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

            <!-- Main Content Column -->
            <div class="lg:col-span-8">
                <!-- Article Header -->
                <div class="mb-10">
                    <!-- Category & Meta Info -->
                    <div class="flex flex-wrap items-center gap-3 text-base md:text-lg text-gray-600 mb-6">
                        <span class="px-4 py-2 bg-gradient-to-r from-[#FF2D20] to-[#e0281b] text-white rounded-full font-semibold text-sm md:text-base shadow-lg shadow-red-500/30">
                            {{ $blog->category }}
                        </span>
                        <span class="hidden sm:inline">•</span>
                        <span class="text-sm md:text-base">{{ $blog->created_at->format('M d, Y') }}</span>
                        <span class="hidden sm:inline">•</span>
                        <span class="text-sm md:text-base flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $blog->sections['other_data']['reading_time'] ?? '5' }} min read
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 mb-8 leading-tight tracking-tight">
                        {{ $blog->title }}
                    </h1>

                    <!-- Main Image -->
                    @if($blog->main_image)
                    <div class="relative w-full aspect-video md:aspect-[21/9] bg-gray-200 rounded-2xl overflow-hidden shadow-2xl mb-12 group">
                        <img src="{{ Str::startsWith($blog->main_image, 'http') ? $blog->main_image : asset('storage/' . $blog->main_image) }}"
                            alt="{{ $blog->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    @endif
                </div>

                <!-- Article Body -->
                <article class="prose prose-lg md:prose-xl max-w-none">

                    <!-- Intro Section -->
                    @if(isset($blog->sections['intro']))
                    <div class="mb-12 bg-white rounded-2xl p-6 md:p-10 shadow-lg border border-gray-200">
                        @if(!empty($blog->sections['intro']['heading']))
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
                            {{ $blog->sections['intro']['heading'] }}
                        </h2>
                        @endif
                        @if(!empty($blog->sections['intro']['content']))
                        <div class="text-lg md:text-xl leading-relaxed text-gray-700 first-letter:text-5xl first-letter:font-bold first-letter:text-[#FF2D20] first-letter:mr-2 first-letter:float-left">
                            {!! $blog->sections['intro']['content'] !!}
                        </div>
                        @endif
                    </div>
                    @endif

                    <!-- Main Sections Loop -->
                    @if(isset($blog->sections['main_sections']))
                    @foreach($blog->sections['main_sections'] as $index => $section)
                    <div class="mb-12 scroll-mt-24" id="section-{{ $index }}">
                        @if(!empty($section['heading']))
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 pb-4 border-b-4 border-[#FF2D20]/30">
                            {{ $section['heading'] }}
                        </h2>
                        @endif
                        @if(!empty($section['content']))
                        <div class="text-lg md:text-xl leading-relaxed text-gray-700 mb-8 space-y-4">
                            {!! $section['content'] !!}
                        </div>
                        @endif

                        <!-- Section Images -->
                        @if(!empty($section['images']) && is_array($section['images']))
                        <div class="grid grid-cols-1 {{ count($section['images']) > 1 ? 'md:grid-cols-2' : '' }} gap-6 my-8">
                            @foreach($section['images'] as $imgIndex => $img)
                            <div class="relative rounded-xl overflow-hidden shadow-xl group aspect-video">
                                <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    alt="Section Image {{ $imgIndex + 1 }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @endif

                    <!-- Highlights -->
                    @if(isset($blog->sections['highlights']))
                    <div class="bg-gradient-to-br from-red-50 to-red-100 p-8 md:p-10 rounded-2xl my-12 border-l-8 border-[#FF2D20] shadow-xl">
                        @if(!empty($blog->sections['highlights']['heading']))
                        <h3 class="text-2xl md:text-3xl font-bold text-[#FF2D20] mb-6 flex items-center gap-3">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            {{ $blog->sections['highlights']['heading'] }}
                        </h3>
                        @endif
                        @if(!empty($blog->sections['highlights']['content']))
                        <div class="text-lg md:text-xl text-gray-800 [&>ul]:list-none [&>ul>li]:pl-6 [&>ul>li]:relative [&>ul>li]:mb-3 [&>ul>li::before]:content-['✓'] [&>ul>li::before]:absolute [&>ul>li::before]:left-0 [&>ul>li::before]:text-[#FF2D20] [&>ul>li::before]:font-bold [&>ul>li::before]:text-2xl">
                            {!! $blog->sections['highlights']['content'] !!}
                        </div>
                        @endif
                    </div>
                    @endif

                    <!-- FAQ -->
                    @if(isset($blog->sections['faq']))
                    <div class="my-12 bg-white rounded-2xl p-8 md:p-10 shadow-lg border border-gray-200">
                        @if(!empty($blog->sections['faq']['heading']))
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 flex items-center gap-3">
                            <svg class="w-9 h-9 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $blog->sections['faq']['heading'] }}
                        </h2>
                        @endif
                        @if(!empty($blog->sections['faq']['content']))
                        <div class="text-lg md:text-xl text-gray-700 space-y-6 [&>p>strong]:text-[#FF2D20] [&>p>strong]:text-xl [&>p>strong]:md:text-2xl [&>p>strong]:block [&>p>strong]:mb-2">
                            {!! $blog->sections['faq']['content'] !!}
                        </div>
                        @endif
                    </div>
                    @endif

                    <!-- Booking Info & CTA -->
                    @if(isset($blog->sections['booking_info']))
                    <div class="my-12 p-8 md:p-10 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl border-2 border-[#FF2D20]/30 shadow-xl">
                        @if(!empty($blog->sections['booking_info']['heading']))
                        <h3 class="text-2xl md:text-3xl font-bold text-[#FF2D20] mb-6">
                            {{ $blog->sections['booking_info']['heading'] }}
                        </h3>
                        @endif
                        @if(!empty($blog->sections['booking_info']['content']))
                        <div class="text-lg md:text-xl text-gray-800">{!! $blog->sections['booking_info']['content'] !!}</div>
                        @endif
                    </div>
                    @endif

                    @if(isset($blog->sections['cta']))
                    <div class="my-12 text-center bg-gradient-to-r from-[#FF2D20] to-[#e0281b] p-10 md:p-16 rounded-3xl shadow-2xl">
                        @if(!empty($blog->sections['cta']['heading']))
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $blog->sections['cta']['heading'] }}</h2>
                        @endif
                        @if(!empty($blog->sections['cta']['content']))
                        <div class="text-xl md:text-2xl text-white/90 mb-8">{!! $blog->sections['cta']['content'] !!}</div>
                        @endif
                        <a href="{{ route('contact') }}" class="inline-block px-10 py-5 bg-white text-[#FF2D20] text-lg md:text-xl font-bold rounded-full hover:bg-gray-100 hover:scale-105 transition-all duration-300 shadow-2xl no-underline">
                            Contact Us Now →
                        </a>
                    </div>
                    @endif

                    <!-- Conclusion -->
                    @if(isset($blog->sections['conclusion']))
                    <div class="mt-16 pt-12 border-t-4 border-gray-200">
                        @if(!empty($blog->sections['conclusion']['heading']))
                        <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                            {{ $blog->sections['conclusion']['heading'] }}
                        </h3>
                        @endif
                        @if(!empty($blog->sections['conclusion']['content']))
                        <div class="text-lg md:text-xl leading-relaxed text-gray-700">
                            {!! $blog->sections['conclusion']['content'] !!}
                        </div>
                        @endif
                    </div>
                    @endif

                </article>

                <!-- Tags -->
                @if($blog->tags && count($blog->tags) > 0)
                <div class="mt-12 pt-8 border-t-2 border-gray-200">
                    <h4 class="text-xl md:text-2xl font-bold text-gray-700 mb-4">Related Topics:</h4>
                    <div class="flex flex-wrap gap-3">
                        @foreach($blog->tags as $tag)
                        <span class="px-5 py-2.5 bg-gray-100 text-gray-800 rounded-full text-base md:text-lg font-medium hover:bg-[#FF2D20] hover:text-white transition-colors duration-300 cursor-pointer">
                            #{{ $tag }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Back Link -->
                <div class="mt-16">
                    <a href="{{ url('/blog') }}" class="inline-flex items-center gap-3 text-[#FF2D20] text-lg md:text-xl font-semibold hover:gap-4 transition-all duration-300 group">
                        <svg class="w-6 h-6 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to All Posts
                    </a>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="lg:col-span-4">
                <div class="sticky top-24 space-y-8">

                    <!-- Travel Agency CTA Widget -->
                    <div class="bg-gradient-to-br from-gray-900 to-gray-800 text-white p-8 rounded-2xl shadow-2xl relative overflow-hidden">
                        <div class="relative z-10">
                            <h3 class="text-2xl md:text-3xl font-bold mb-4">Plan Your Dream Trip</h3>
                            <p class="text-gray-200 mb-8 text-base md:text-lg leading-relaxed">Let FamousToursIndia curate the perfect itinerary for you. Exclusive deals available!</p>
                            <a href="{{ route('contact') }}" class="block w-full text-center bg-gradient-to-r from-[#FF2D20] to-[#e0281b] hover:from-[#e0281b] hover:to-[#FF2D20] text-white font-bold py-4 rounded-xl transition-all duration-300 hover:scale-105 shadow-lg text-base md:text-lg">
                                Get a Free Quote
                            </a>
                        </div>
                        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-[#FF2D20]/20 rounded-full blur-3xl"></div>
                        <div class="absolute -top-10 -left-10 w-40 h-40 bg-red-500/20 rounded-full blur-3xl"></div>
                    </div>

                    <!-- Latest Offers Widget -->
                    @if(isset($latest_offers) && $latest_offers->count() > 0)
                    <div class="bg-white rounded-2xl border-2 border-gray-200 p-8 shadow-xl">
                        <h3 class="font-bold text-2xl md:text-3xl mb-6 pb-4 border-b-2 border-gray-200 text-gray-900">Latest Offers</h3>
                        <div class="space-y-6">
                            @foreach($latest_offers as $offer)
                            <div class="group cursor-pointer">
                                <div class="h-40 bg-gray-200 rounded-xl overflow-hidden mb-4 shadow-md">
                                    @if($offer->image)
                                    <img src="{{ asset('storage/' . $offer->image) }}" alt="{{ $offer->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 text-base">No Image</div>
                                    @endif
                                </div>
                                <h4 class="font-bold text-lg md:text-xl mb-2 group-hover:text-[#FF2D20] transition-colors text-gray-900">{{ $offer->name }}</h4>
                                <p class="text-base text-gray-600 line-clamp-2">{{ $offer->description }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
