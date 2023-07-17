<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodNutrition;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([ 
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@mail.com',
        ]);
        FoodNutrition::factory()->count(5)->create();
    }
}
