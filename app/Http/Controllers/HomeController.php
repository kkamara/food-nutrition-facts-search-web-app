<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodNutrition;

class HomeController extends Controller
{
    protected FoodNutrition $foodNutrition;

    public function __construct() {
        $this->foodNutrition = new FoodNutrition();
    }

    /**
     * Show the homepage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $title = 'Home';
        $facts = $this->foodNutrition->inRandomOrder()->limit(5)->get();
        return view('home', compact('title', 'facts'));
    }
}
