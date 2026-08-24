<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use App\Country;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(1)->create()->each(function ($u) {
            $u->country()->save(Country::factory()->make());
        });
    }
}
