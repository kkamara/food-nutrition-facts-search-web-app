<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\FoodNutrition;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @property Array
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @property Array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @property Array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
// $user->foodNutrition()->create(['food_nutrition_fact'=>'Healthy food is good'])
    /**
     * The attributes that shouldn't be overwritten.
     *
     * @property Array
     */
    protected $guarded = [];

    public function foodNutrition() {
        return $this->hasMany(
            FoodNutrition::class, 'users_id'
        );
    }
}
