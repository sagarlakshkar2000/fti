<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Using hardcoded data for reliability

        \App\Models\Blog::updateOrCreate(
            ['slug' => 'top-5-summer-destinations-india'],
            [
                'title' => 'Top 5 Summer Destinations in India',
                'category' => 'Travel Guide',
                'tags' => ['Summer', 'India', 'Mountains', 'Vacation'],
                'main_image' => 'https://picsum.photos/1200/800?random=1',
                'status' => 'published',
                'meta_title' => 'Top 5 Summer Destinations in India - FamousToursIndia',
                'meta_description' => 'Escape the heat! Discover the top 5 summer destinations in India with FamousToursIndia.',
                'sections' => [
                    'intro' => [
                        'heading' => 'Escape the Heat: Best Summer Getaways',
                        'content' => '<p>Summer in India can be scorching, but it\'s also the perfect excuse to pack your bags and head to the mountains. Whether you are looking for snow-capped peaks, lush green meadows, or serene lakes, India offers a plethora of options to beat the heat.</p><p>At <strong>FamousToursIndia</strong>, we have curated a list of the top 5 destinations that promise a refreshing retreat.</p>',
                        'images' => []
                    ],
                    'main_sections' => [
                        [
                            'heading' => '1. Manali, Himachal Pradesh',
                            'content' => '<p>Manali is the classic summer retreat. Nestled in the Beas River Valley, it offers a blend of adventure and tranquility. Visit the Solang Valley for paragliding or simply stroll through the Old Manali markets.</p>',
                            'images' => ['https://picsum.photos/800/600?random=2', 'https://picsum.photos/800/600?random=3']
                        ],
                        [
                            'heading' => '2. Ladakh, Jammu & Kashmir',
                            'content' => '<p>For the adventurous soul, Ladakh is the ultimate destination. The stark, rugged landscape contrasted with blue lakes like Pangong Tso creates a mesmerizing view. It\'s a road tripper\'s paradise.</p>',
                            'images' => ['https://picsum.photos/800/600?random=4']
                        ],
                        [
                            'heading' => '3. Coorg, Karnataka',
                            'content' => '<p>Known as the \'Scotland of India\', Coorg is famous for its coffee plantations and misty landscapes. It\'s the perfect spot for nature lovers who want to relax amidst greenery.</p>',
                            'images' => ['https://picsum.photos/800/600?random=5']
                        ],
                        [
                            'heading' => '4. Ooty, Tamil Nadu',
                            'content' => '<p>The Queen of Hill Stations, Ooty, charms visitors with its colonial architecture and the famous Nilgiri Mountain Railway. Don\'t miss the Botanical Gardens and Ooty Lake.</p>',
                            'images' => ['https://picsum.photos/800/600?random=6']
                        ],
                        [
                            'heading' => '5. Gangtok, Sikkim',
                            'content' => '<p>Experience the pristine beauty of the North East in Gangtok. With views of Kanchenjunga and colorful monasteries, it offers a spiritual and scenic escape.</p>',
                            'images' => ['https://picsum.photos/800/600?random=7']
                        ]
                    ],
                    'highlights' => [
                        'heading' => 'Why These Destinations?',
                        'content' => '<ul><li><strong>Weather:</strong> Pleasant temperatures ranging from 15°C to 25°C.</li><li><strong>Activities:</strong> Trekking, rafting, sightseeing, and cultural immersion.</li><li><strong>Accessibility:</strong> Well-connected by road and air.</li></ul>',
                        'images' => []
                    ],
                    'faq' => [
                        'heading' => 'Frequently Asked Questions',
                        'content' => '<p><strong>Q: Best time to book?</strong><br>A: We recommend booking at least 2 months in advance for summer travel.</p><p><strong>Q: Are these family-friendly?</strong><br>A: Yes, all these destinations are perfect for families, couples, and solo travelers.</p>',
                        'images' => []
                    ],
                    'booking_info' => [
                        'heading' => 'Book Your Tour with FamousToursIndia',
                        'content' => '<p>Ready to explore? Booking with <strong>FamousToursIndia</strong> ensures a hassle-free experience. We offer customized packages, premium accommodation, and 24/7 support.</p><p>Don\'t let the summer pass you by without a vacation!</p>',
                        'images' => []
                    ],
                    'cta' => [
                        'heading' => 'Start Your Journey Today',
                        'content' => '<p>Contact us now to get a free quote for your dream summer vacation.</p><p>Email: <a href=\'mailto:info@famoustoursindia.com\'>info@famoustoursindia.com</a> | Phone: +91-9876543210</p>',
                        'images' => []
                    ],
                    'conclusion' => [
                        'heading' => 'Conclusion',
                        'content' => '<p>India\'s diversity ensures there\'s a perfect summer destination for everyone. Pack your bags and let <strong>FamousToursIndia</strong> guide you to your next adventure.</p>',
                        'images' => []
                    ],
                    'other_data' => [
                        'reading_time' => 5
                    ]
                ]
            ]
        );
    }
}
