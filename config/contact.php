<?php

return [
    'phone' => '+91 98765 43210',
    'email' => 'famoustoursindia@gmail.com',
    'facebook' => '#',
    'instagram' => '#',
    'linkedin' => '#',
    'whatsapp' => '#',
    'x' => '#',
    'google' => 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg',
    'tripadvisor' => 'https://static.tacdn.com/img2/brand_refresh/Tripadvisor_lockup_horizontal_secondary_registered.svg',
    'logo' => '/assets/images/logo.jpg',
    'navbarRoutes' => [
        'Home' => [
            'name' => 'Home',
            'route' => url('/'),
            'icon' => 'fas fa-home',
            'active' => 'active',

        ],
        'About' => [
            'name' => 'About',
            'route' => url('/about'),
            'icon' => 'fas fa-info-circle',
            'active' => 'active',
        ],
        'Contact' => [
            'name' => 'Contact',
            'route' => url('/contact'),
            'icon' => 'fas fa-phone',
            'active' => 'active',
        ],
        'Blog' => [
            'name' => 'Blog',
            'route' => url('/blog'),
            'icon' => 'fas fa-blog',
            'active' => 'active',
        ],
    ],
];
