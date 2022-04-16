<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $icon = [
            [
                'name'  => 'primary',
                'fa_name' => 'primary',
            ],
            [
                'name'  => 'info',
                'fa_name' => 'info',
            ],
            [
                'name'  => 'success',
                'fa_name' => 'success',
            ],
            [
                'name'  => 'danger',
                'fa_name' => 'danger',
            ],
            [
                'name'  => 'warning',
                'fa_name' => 'warning',
            ],
        ];

        DB::table('icons')->insert($icon);
    }
}
