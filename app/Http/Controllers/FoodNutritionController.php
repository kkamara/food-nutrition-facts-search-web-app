<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\FoodNutrition;
use Illuminate\Http\Request;
use App\Models\User;

class FoodNutritionController extends Controller
{
    /**
     * @property FoodNutrition $foodNutrition
     */
    protected FoodNutrition $foodNutrition;

    /**
     * @property User $user
     */
    protected User $user;

    public function __construct() {
        $this->middleware('auth')->only('store');
        $this->foodNutrition = new FoodNutrition();
        $this->user = new User();
    }

    /**
     * Creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|array<string>
     */
    public function store(Request $request)
    {
        $fact = $this->foodNutrition->getFact($request->input('query')); # Send request to get fact.
        $fact = json_decode((string) $fact, false); # Give me a class object.
        $fact = $fact->results[0];
        Log::debug(print_r($fact, true)); # Log to log channel (default: storage/logs/laravel.log).
        $this->user = auth()->user();
        Log::debug($fact->title);
        Log::debug($this->user->id);
        $this->user->foodNutrition()->create([ 'food_nutrition_fact' => $fact->title]);
        return redirect('/')->with(['fact' => $fact->title,]);
    }
}
