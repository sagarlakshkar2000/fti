<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    public function run(): void
    {
        $offers = [
            [
                'title' => 'Golden Triangle Tour - Special Discount',
                'description' => 'Explore Delhi, Agra & Jaipur with 25% off! Experience the best of India\'s heritage.',
                'image' => 'https://picsum.photos/seed/golden-triangle/800/600',
                'link' => '/packages/golden-triangle',
                'type' => 'tour',
                'discount' => 25,
                'original_price' => 50000,
                'discounted_price' => 37500,
                'is_active' => true,
            ],
            [
                'title' => 'Kerala Backwaters - Houseboat Package',
                'description' => 'Enjoy serene backwaters of Kerala with luxury houseboat stay. Limited time offer!',
                'image' => 'https://picsum.photos/seed/kerala-backwaters/800/600',
                'link' => '/packages/kerala-backwaters',
                'type' => 'tour',
                'discount' => 30,
                'original_price' => 35000,
                'discounted_price' => 24500,
                'is_active' => true,
            ],
            [
                'title' => 'Rajasthan Heritage Tour',
                'description' => 'Discover the royal palaces and forts of Rajasthan. Book now and save big!',
                'image' => 'https://picsum.photos/seed/rajasthan-heritage/800/600',
                'link' => '/packages/rajasthan-heritage',
                'type' => 'tour',
                'discount' => 20,
                'original_price' => 60000,
                'discounted_price' => 48000,
                'is_active' => true,
            ],
            [
                'title' => 'Goa Beach Holiday',
                'description' => 'Relax on pristine beaches with all-inclusive resort package. Summer special!',
                'image' => 'https://picsum.photos/seed/goa-beach/800/600',
                'link' => '/packages/goa-beach',
                'type' => 'tour',
                'discount' => 15,
                'original_price' => 25000,
                'discounted_price' => 21250,
                'is_active' => true,
            ],
            [
                'title' => 'Himachal Adventure Package',
                'description' => 'Trekking, camping & mountain adventures in the Himalayas. Early bird discount!',
                'image' => 'https://picsum.photos/seed/himachal-adventure/800/600',
                'link' => '/packages/himachal-adventure',
                'type' => 'tour',
                'discount' => 35,
                'original_price' => 40000,
                'discounted_price' => 26000,
                'is_active' => true,
            ],
        ];

        foreach ($offers as $offer) {
            Offer::updateOrCreate(
                ['title' => $offer['title']],
                $offer
            );
        }
    }
}
