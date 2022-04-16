<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventWaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event_pixel = [
            [
                'name'        => 'Add Payment Info',
                'event_pixel'  => "fbq('track', 'AddPaymentInfo');",
            ],
            [
                'name'        => 'Add To Cart',
                'event_pixel'  => "fbq('track', 'AddToCart');",
            ],
            [
                'name'        => 'Add To Wishlist',
                'event_pixel'  => "fbq('track', 'AddToWishlist');",
            ],
            [
                'name'        => 'Complete Registration',
                'event_pixel'  => "fbq('track', 'CompleteRegistration');",
            ],
            [
                'name'        => 'Contack',
                'event_pixel'  => "fbq('track', 'Contact');",
            ],
            [
                'name'        => 'Customize Product',
                'event_pixel'  => "fbq('track', 'CustomizeProduct');",
            ],
            [
                'name'        => 'Lead',
                'event_pixel'  => "fbq('track', 'Lead');",
            ],
            [
                'name'        => 'Purchase',
                'event_pixel'  => "fbq('track', 'Purchase', {value: 0.00, currency: 'IDR'});",
            ],
            [
                'name'        => 'View Content',
                'event_pixel'  => "fbq('track', 'ViewContent');",
            ],
        ];

        DB::table('event_was')->insert($event_pixel);
    }
}
