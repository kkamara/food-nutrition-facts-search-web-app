<?php

namespace Database\Factories;

use App\Models\FoodNutrition;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class FoodNutritionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FoodNutrition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        'food_nutrition_fact' => $this->faker->sentence(),
        'users_id' => User::inRandomOrder()->first(),
      ];
    }
}
