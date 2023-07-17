<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class FoodNutrition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @property Array
     */
    protected $fillable = ['food_nutrition_fact'];

    public function user() {
        return $this->belongsTo(
            User::class, 'users_id'
        );
    }
}
