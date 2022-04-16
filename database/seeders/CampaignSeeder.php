<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campaign = [
            [
                'admin_id'        => 1,
                'user_id'         => 9,
                'title'           => 'Hanif',
                'product_id'      => 5,
                'message'         => Str::random(40),
                'facebook_pixel'  => random_int(0000000000, 9999999999),
                'event_pixel_id'  => random_int(1, 9),
                'event_wa_id'     => random_int(1, 9),
                'auto_text'       => Str::random(40),
            ],
            [
                'admin_id'        => 1,
                'user_id'         => 9,
                'title'           => 'Hanif',
                'product_id'      => 1,
                'message'         => Str::random(40),
                'facebook_pixel'  => random_int(0000000000, 9999999999),
                'event_pixel_id'  => random_int(1, 9),
                'event_wa_id'     => random_int(1, 9),
                'auto_text'       => Str::random(40),
            ],
            [
                'admin_id'        => 1,
                'user_id'         => 9,
                'title'           => 'Hanif',
                'product_id'      => 3,
                'message'         => Str::random(40),
                'facebook_pixel'  => random_int(0000000000, 9999999999),
                'event_pixel_id'  => random_int(1, 9),
                'event_wa_id'     => random_int(1, 9),
                'auto_text'       => Str::random(40),
            ],
            [
                'admin_id'        => 1,
                'user_id'         => 11,
                'title'           => 'Rifan',
                'product_id'      => 1,
                'message'         => Str::random(40),
                'facebook_pixel'  => random_int(0000000000, 9999999999),
                'event_pixel_id'  => random_int(1, 9),
                'event_wa_id'     => random_int(1, 9),
                'auto_text'       => Str::random(40),
            ],
            [
                'admin_id'        => 1,
                'user_id'         => 11,
                'title'           => 'Rifan',
                'product_id'      => 3,
                'message'         => Str::random(40),
                'facebook_pixel'  => random_int(0000000000, 9999999999),
                'event_pixel_id'  => random_int(1, 9),
                'event_wa_id'     => random_int(1, 9),
                'auto_text'       => Str::random(40),
            ],
            [
                'admin_id'        => 1,
                'user_id'         => 10,
                'title'           => 'Awal',
                'product_id'      => 1,
                'message'         => Str::random(40),
                'facebook_pixel'  => random_int(0000000000, 9999999999),
                'event_pixel_id'  => random_int(1, 9),
                'event_wa_id'     => random_int(1, 9),
                'auto_text'       => Str::random(40),
            ],
            [
                'admin_id'        => 1,
                'user_id'         => 10,
                'title'           => 'Awal',
                'product_id'      => 3,
                'message'         => Str::random(40),
                'facebook_pixel'  => random_int(0000000000, 9999999999),
                'event_pixel_id'  => random_int(1, 9),
                'event_wa_id'     => random_int(1, 9),
                'auto_text'       => Str::random(40),
            ],
            [
                'admin_id'        => 1,
                'user_id'         => 13,
                'title'           => 'Jihad',
                'product_id'      => 2,
                'message'         => Str::random(40),
                'facebook_pixel'  => random_int(0000000000, 9999999999),
                'event_pixel_id'  => random_int(1, 9),
                'event_wa_id'     => random_int(1, 9),
                'auto_text'       => Str::random(40),
            ],
            [
                'admin_id'        => 1,
                'user_id'         => 12,
                'title'           => 'Isnan',
                'product_id'      => 4,
                'message'         => Str::random(40),
                'facebook_pixel'  => random_int(0000000000, 9999999999),
                'event_pixel_id'  => random_int(1, 9),
                'event_wa_id'     => random_int(1, 9),
                'auto_text'       => Str::random(40),
            ],
        ];

        DB::table('campaigns')->insert($campaign);
    }
}
