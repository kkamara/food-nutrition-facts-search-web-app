<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use GuzzleHttp\Client;

class FoodNutrition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @property array $fillable
     */
    protected $fillable = ['food_nutrition_fact'];

    public function user() {
        return $this->belongsTo(
            User::class, 'users_id'
        );
    }

    /**
     * @param string $query Our query for food nutrition facts.
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getFact($query) {
        $http = new Client();
        $response = $http->request(
            'GET', 
            "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/complexSearch?query=$query",
            [
                'headers' => [
                    'X-RapidAPI-Host' => config('app.radidApiHost'),
                    'X-RapidAPI-Key' => config('app.rapidApiKey'),
                ],
            ]
        );
        
        return $response->getBody();
    }
}
