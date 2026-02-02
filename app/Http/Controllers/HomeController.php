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

        return view('index', compact('taxiServices', 'serviceIcons', 'latestOffers'));
    }

    public function about(Request $request)
    {
        return view('about');
    }

    public function contact(Request $request)
    {
        return view('contact');
    }

    public function blog(Request $request)
    {
        return view('blog');
    }

    public function blogDetail(Request $request)
    {
        return view('blog-detail');
    }
}
