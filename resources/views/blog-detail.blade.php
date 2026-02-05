@extends('layouts.app')

@section('title', $title)
@section('meta_description', $meta_description)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

        <!-- Main Content Column -->
        <div class="lg:col-span-2">
            <!-- Article Header -->
            <div class="mb-8">
                <div class="flex items-center gap-2 text-sm text-[#706f6c] dark:text-[#A1A09A] mb-4">
                    <span class="px-3 py-1 bg-[#FF2D20]/10 text-[#FF2D20] rounded-full font-medium">{{ $blog->category }}</span>
                    <span>&bull;</span>
                    <span>{{ $blog->created_at->format('M d, Y') }}</span>
                    <span>&bull;</span>
                    <span>{{ $blog->sections['other_data']['reading_time'] ?? '5' }} min read</span>
                </div>
                <h1 class="text-3xl md:text-5xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-6 leading-tight">
                    {{ $blog->title }}
                </h1>

                <!-- Main Image -->
                @if($blog->main_image)
                <div class="w-full h-80 md:h-[500px] bg-gray-200 rounded-lg mb-10 overflow-hidden">
                    <img src="{{ Str::startsWith($blog->main_image, 'http') ? $blog->main_image : asset('storage/' . $blog->main_image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
                </div>
                @endif
            </div>

            <!-- Article Body -->
            <article class="prose prose-lg dark:prose-invert max-w-none text-[#1b1b18] dark:text-[#EDEDEC]">

                <!-- Intro Section -->
                @if(isset($blog->sections['intro']))
                <div class="mb-8">
                    @if(!empty($blog->sections['intro']['heading']))
                    <h3>{{ $blog->sections['intro']['heading'] }}</h3>
                    @endif
                    <div class="text-xl leading-relaxed text-[#706f6c] dark:text-[#A1A09A]">
                        {!! $blog->sections['intro']['content'] !!}
                    </div>
                </div>
                @endif

                <!-- Main Sections Loop -->
                @if(isset($blog->sections['main_sections']))
                @foreach($blog->sections['main_sections'] as $section)
                <div class="mb-8">
                    @if(!empty($section['heading']))
                    <h2>{{ $section['heading'] }}</h2>
                    @endif
                    <div class="mb-4 text-[#706f6c] dark:text-[#A1A09A]">
                        {!! $section['content'] !!}
                    </div>
                    <!-- Section Images -->
                    @if(!empty($section['images']) && is_array($section['images']))
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-6">
                        @foreach($section['images'] as $img)
                        <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}" class="rounded-lg w-full h-64 object-cover" alt="Section Image">
                        @endforeach
                    </div>
                    @endif
                </div>
                @endforeach
                @endif

                <!-- Highlights -->
                @if(isset($blog->sections['highlights']))
                <div class="bg-gray-50 dark:bg-zinc-800 p-6 rounded-lg my-8 border-l-4 border-[#FF2D20]">
                    @if(!empty($blog->sections['highlights']['heading']))
                    <h3 class="mt-0 text-[#FF2D20]">{{ $blog->sections['highlights']['heading'] }}</h3>
                    @endif
                    <div>{!! $blog->sections['highlights']['content'] !!}</div>
                </div>
                @endif

                <!-- FAQ -->
                @if(isset($blog->sections['faq']))
                <div class="my-8">
                    @if(!empty($blog->sections['faq']['heading']))
                    <h2>{{ $blog->sections['faq']['heading'] }}</h2>
                    @endif
                    <div>{!! $blog->sections['faq']['content'] !!}</div>
                </div>
                @endif

                <!-- Booking Info & CTA -->
                @if(isset($blog->sections['booking_info']))
                <div class="my-8 p-6 bg-[#FF2D20]/5 rounded-xl border border-[#FF2D20]/20">
                    @if(!empty($blog->sections['booking_info']['heading']))
                    <h3 class="mt-0 text-[#FF2D20]">{{ $blog->sections['booking_info']['heading'] }}</h3>
                    @endif
                    <div>{!! $blog->sections['booking_info']['content'] !!}</div>
                </div>
                @endif

                @if(isset($blog->sections['cta']))
                <div class="my-8 text-center">
                    @if(!empty($blog->sections['cta']['heading']))
                    <h2>{{ $blog->sections['cta']['heading'] }}</h2>
                    @endif
                    <div>{!! $blog->sections['cta']['content'] !!}</div>
                    <a href="{{ route('contact') }}" class="inline-block mt-4 px-8 py-3 bg-[#FF2D20] text-white font-bold rounded-full hover:bg-[#e0281b] transition no-underline">
                        Contact Us Now
                    </a>
                </div>
                @endif

                <!-- Conclusion -->
                @if(isset($blog->sections['conclusion']))
                <div class="mt-12 pt-8 border-t border-gray-200 dark:border-zinc-700">
                    @if(!empty($blog->sections['conclusion']['heading']))
                    <h3>{{ $blog->sections['conclusion']['heading'] }}</h3>
                    @endif
                    <div>{!! $blog->sections['conclusion']['content'] !!}</div>
                </div>
                @endif

            </article>

            <!-- Back Link -->
            <div class="mt-12">
                <a href="{{ url('/blog') }}" class="text-[#FF2D20] font-medium hover:underline flex items-center gap-2">
                    &larr; Back to All Posts
                </a>
            </div>
        </div>

        <!-- Sidebar Column -->
        <div class="lg:col-span-1">
            <div class="sticky top-24 space-y-8">

                <!-- Travel Agency CTA Widget -->
                <div class="bg-[#1b1b18] text-white p-6 rounded-xl shadow-lg relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold mb-3">Plan Your Dream Trip</h3>
                        <p class="text-gray-300 mb-6 text-sm">Let FamousToursIndia curate the perfect itinerary for you. Exclusive deals available!</p>
                        <a href="{{ route('contact') }}" class="block w-full text-center bg-[#FF2D20] hover:bg-[#e0281b] text-white font-bold py-2 rounded transition">
                            Get a Free Quote
                        </a>
                    </div>
                    <!-- Decorative Circle -->
                    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-[#FF2D20]/20 rounded-full blur-2xl"></div>
                </div>

                <!-- Latest Offers Widget -->
                @if(isset($latest_offers) && $latest_offers->count() > 0)
                <div class="bg-white dark:bg-zinc-900 rounded-xl border border-[#e3e3e0] dark:border-[#3E3E3A] p-6">
                    <h3 class="font-bold text-lg mb-4 pb-2 border-b border-[#e3e3e0] dark:border-[#3E3E3A]">Latest Offers</h3>
                    <div class="space-y-6">
                        @foreach($latest_offers as $offer)
                        <div class="group">
                            <div class="h-32 bg-gray-200 rounded-lg overflow-hidden mb-3">
                                @if($offer->image)
                                <img src="{{ asset('storage/' . $offer->image) }}" alt="{{ $offer->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">No Image</div>
                                @endif
                            </div>
                            <h4 class="font-bold text-sm mb-1 group-hover:text-[#FF2D20] transition">{{ $offer->name }}</h4>
                            <p class="text-xs text-[#706f6c] dark:text-[#A1A09A] line-clamp-2">{{ $offer->description }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>

    </div>
</div>
@endsection
