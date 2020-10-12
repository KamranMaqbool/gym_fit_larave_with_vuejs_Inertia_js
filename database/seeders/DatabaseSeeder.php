<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\InitalDataSeeder;
use Database\Seeders\PackageDataSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
    	$this->call([
            UserTableSeeder::class,
    		InitalDataSeeder::class,
            PackageDataSeeder::class,
    	]);
    }
}
