<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operator = [
            [
                'admin_id'        => 1,
                'campaign_id'   => 1,
                'user_id'       => 32,
                'name'          => 'Friska',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 1,
                'user_id'       => 33,
                'name'          => 'Sovi',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 1,
                'user_id'       => 35,
                'name'          => 'Nur',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 1,
                'user_id'       => 18,
                'name'          => 'Ana',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 1,
                'user_id'       => 22,
                'name'          => 'Nanda',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 1,
                'user_id'       => 23,
                'name'          => 'Tini',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 2,
                'user_id'       => 35,
                'name'          => 'Nur',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 2,
                'user_id'       => 24,
                'name'          => 'Uswatun',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 2,
                'user_id'       => 21,
                'name'          => 'Ristika',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 2,
                'user_id'       => 20,
                'name'          => 'Ananda',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 3,
                'user_id'       => 35,
                'name'          => 'Nur',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 3,
                'user_id'       => 16,
                'name'          => 'Hutari',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 3,
                'user_id'       => 34,
                'name'          => 'Haya',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 3,
                'user_id'       => 36,
                'name'          => 'Riza',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 4,
                'user_id'       => 17,
                'name'          => 'Rosi',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 5,
                'user_id'       => 17,
                'name'          => 'Rosi',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 5,
                'user_id'       => 16,
                'name'          => 'Hutari',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 5,
                'user_id'       => 36,
                'name'          => 'Riza',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 6,
                'user_id'       => 19,
                'name'          => 'Ida',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 6,
                'user_id'       => 20,
                'name'          => 'Ananda',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 7,
                'user_id'       => 19,
                'name'          => 'Ida',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 7,
                'user_id'       => 16,
                'name'          => 'Hutari',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 8,
                'user_id'       => 24,
                'name'          => 'Uswatun',
            ],
            [
                'admin_id'        => 1,
                'campaign_id'   => 9,
                'user_id'       => 34,
                'name'          => 'Haya',
            ],
        ];

        DB::table('operators')->insert($operator);
    }
}
