<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paket = [
            [
                'name'  => 'Enterpreneur Plan',
                'price' => 139000,
            ],
            [
                'name'  => 'Flexible Plan',
                'price' => 300,
            ],
            [
                'name'  => 'Corporate Plan',
                'price' => 299000,
            ],
        ];

        DB::table('pakets')->insert($paket);
    }
}
