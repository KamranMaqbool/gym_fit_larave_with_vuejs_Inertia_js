<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
        	'name' => 'aaa',
        	'email' => 'a@gmail.com',
        	'password' => bcrypt('12345678'),
        ]);

        \App\Models\User::create([
        	'name' => 'bbb',
        	'email' => 'b@gmail.com',
        	'password' => bcrypt('12345678'),
        ]);
    }
}
