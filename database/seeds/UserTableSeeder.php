<?php

use Illuminate\Database\Seeder;
//use App\User;
//use App\Country;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        

        factory(App\User::class, 2)->create()->each(function($u) {
            $u->country()->save(factory(App\Country::class)->make());
        });    
        
    }

  
}
