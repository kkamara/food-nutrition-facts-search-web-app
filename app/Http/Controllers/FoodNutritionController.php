<?php

namespace App\Http\Controllers;

use App\Models\FoodNutrition;
use Illuminate\Http\Request;

class FoodNutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodNutrition  $foodNutrition
     * @return \Illuminate\Http\Response|array<string>
     */
    public function show(FoodNutrition $foodNutrition)
    {
        return ['message' => 'Success'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodNutrition  $foodNutrition
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodNutrition $foodNutrition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodNutrition  $foodNutrition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodNutrition $foodNutrition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodNutrition  $foodNutrition
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodNutrition $foodNutrition)
    {
        //
    }
}
