<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('packages')->insert([
            [
                'name' => 'Monthly Pacakge',
                'status' => 'active',
                'amount' => '2000',
                'number_of_days' => '30',
            ],
            [
                'name' => 'annual Pacakge',
                'status' => 'active',
                'amount' => '10000',
                'number_of_days' => '365',
            ],
            [
                'name' => 'Weekly Pacakge',
                'status' => 'active',
                'amount' => '500',
                'number_of_days' => '6',
            ]
        ]);
    }
}
