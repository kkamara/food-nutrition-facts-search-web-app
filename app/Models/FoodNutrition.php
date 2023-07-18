<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use GuzzleHttp\Client;

class FoodNutrition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @property Array
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
        $response = $this->client->request(
            'GET', 
            "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/complexSearch?query=$query",
            [
                'headers' => [
                    'X-RapidAPI-Host' => 'spoonacular-recipe-food-nutrition-v1.p.rapidapi.com',
                    'X-RapidAPI-Key' => 'f339b4dde8msh3f3d5d13cd057dep151024jsneb855d176177',
                ],
            ]
        );
        
        return $response->getBody();
    }
}
