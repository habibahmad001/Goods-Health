<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        \App\User::create( ['name' => "admin",
        'email' => "admin@domain.com",
        'email_verified_at' => now(),
        'password' =>  bcrypt('password'),
        'remember_token' => Str::random(10)]);
    }
}
