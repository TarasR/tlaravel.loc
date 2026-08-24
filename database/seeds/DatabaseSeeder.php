<?php

namespace Database\Seeders;

use Database\Seeders\CountriesSeeder;
use Database\Seeders\PageSeeder;
use Database\Seeders\UserTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            CountriesSeeder::class,
            PageSeeder::class,
        ]);
    }
}
