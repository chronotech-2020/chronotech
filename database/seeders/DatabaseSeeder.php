<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => "Aaron Herbosa",
            'nickname' => "Aaron",
            'email' => "arnherbosa@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'age' => "25",
            'sex' => 'Male',
            'birthday' => "06-23-1995",
            'height' => "162.50",
            'weight' => "70",
            'bmi' => "25",
            'diet' => 'Vegetarian',
            'chronotype' => 'Bear',
            'remember_token' => Str::random(10),
        ]);
  
        for($counter = 1; $counter <= 24; $counter++){
            factory(\App\Models\Temperature::class)->create(['hour' => $counter]);
        }
    }
}
