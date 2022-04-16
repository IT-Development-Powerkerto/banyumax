<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class ClosingRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $closing_rates = [
            [
                'admin_id'        => 1,
                'user_id' => 16,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 17,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 18,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 19,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 20,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 21,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 22,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 23,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 24,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 25,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 26,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 27,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 28,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 29,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 30,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
            [
                'admin_id'        => 1,
                'user_id' => 31,
                'day_closing_rate'  => random_int(50, 100)/100,
                'month_closing_rate' => random_int(50, 100)/100
            ],
        ];

        DB::table('closing_rates')->insert($closing_rates);
    }
}
