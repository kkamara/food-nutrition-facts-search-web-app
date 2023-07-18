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

    /**
     * @property Client $http
     */
    protected Client $http;

    public function __construct() {
        $this->client = new Client();
    }

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
        Log::debug(print_r(
            config('app.radidApiHost'), true
        ));
        Log::debug(print_r(
            config('app.radidApiKey'), true
        ));
        $response = $this->client->request(
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
