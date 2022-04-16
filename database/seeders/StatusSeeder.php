<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'name'  => 'Idle',
            ],
            [
                'name'  => 'Work',
            ],
            [
                'name'  => 'Waiting',
            ],
            [
                'name'  => 'Processing',
            ],
            [
                'name'  => 'Closing',
            ],
            [
                'name'  => 'Spam',
            ],
            [
                'name'  => 'Failed',
            ],
        ];

        DB::table('statuses')->insert($status);
    }
}
