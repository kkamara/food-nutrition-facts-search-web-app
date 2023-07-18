<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\FoodNutrition;
use Illuminate\Http\Request;

class FoodNutritionController extends Controller
{
    /**
     * @property FoodNutrition $food
     */
    protected FoodNutrition $foodNutrition;

    public function __construct() {
        $this->foodNutrition = new FoodNutrition();
    }

    /**
     * Creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|array<string>
     */
    public function store(Request $request)
    {
        $fact = $this->foodNutrition->getFact($request->input('query'));
        Log::debug(print_r((string) $fact, true));
        return ['message' => 'Success'];
    }
}
