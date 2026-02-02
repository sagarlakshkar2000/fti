<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $taxiServices = [
            [
                "title" => "Airport Transfers",
                "description" => "On-time pickups and drops with real-time flight tracking and meet & greet service."
            ],
            [
                "title" => "City Rides",
                "description" => "Affordable point-to-point rides with professional drivers who know the city well."
            ],
            [
                "title" => "Outstation Trips",
                "description" => "Comfortable intercity travel with flexible packages and multiple vehicle options."
            ],
            [
                "title" => "Corporate Rides",
                "description" => "Dedicated business travel solutions with monthly billing and priority support."
            ],
            [
                "title" => "Wedding Car Rentals",
                "description" => "Luxury vehicles with professional chauffeurs for your special occasions."
            ],
            [
                "title" => "Hourly Rentals",
                "description" => "Flexible hourly packages for shopping, meetings or multiple stops in the city."
            ]
        ];

        $serviceIcons = [
            'fa-plane',        // Airport Transfers
            'fa-city',         // City Rides
            'fa-route',        // Outstation Trips
            'fa-briefcase',    // Corporate Rides
            'fa-heart',        // Wedding Car Rentals
            'fa-clock'         // Hourly Rentals
        ];

        // Fetch Latest Active Offers from Database
        $latestOffers = \App\Models\Offer::where('is_active', true)
            ->latest()
            ->take(5) // Limit to 5 or as needed
            ->get();

        // SEO Data
        $title = "Best Taxi Service in Udaipur & Rajasthan Tour Packages - Famous Tours India";
        $meta_description = "Famous Tours India offers reliable taxi services in Udaipur, airport transfers, and customized Rajasthan tour packages. Book tailored outstation trips and luxury car rentals.";

        return view('index', compact('taxiServices', 'serviceIcons', 'latestOffers', 'title', 'meta_description'));
    }

    public function about(Request $request)
    {
        $title = "About Us - Famous Tours India | Trusted Travel Partner";
        $meta_description = "Learn more about Famous Tours India, our mission, vision, and the team dedicated to providing the best travel experiences in Rajasthan.";
        return view('about', compact('title', 'meta_description'));
    }

    public function contact(Request $request)
    {
        $title = "Contact Us - Famous Tours India | Book Your Ride Today";
        $meta_description = "Get in touch with Famous Tours India for bookings, inquiries, or support. We are here to help you plan your perfect Rajasthan trip.";
        return view('contact', compact('title', 'meta_description'));
    }

    public function blog(Request $request)
    {
        $title = "Travel Blog - Famous Tours India | Tips & Guides";
        $meta_description = "Read our latest travel blogs, tips, and guides for exploring Udaipur and Rajasthan. Stay updated with Famous Tours India.";
        return view('blog', compact('title', 'meta_description'));
    }

    public function blogDetail(Request $request)
    {
        // Ideally this would come from a database blog post
        $title = "Blog Detail - Famous Tours India";
        $meta_description = "Detailed view of our travel blog post.";
        return view('blog-detail', compact('title', 'meta_description'));
    }
}
