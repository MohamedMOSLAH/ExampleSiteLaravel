<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MovieDBService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
    }

    public function getTrendingMovies($timeWindow = 'day')
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey
        ])->get("https://api.themoviedb.org/3/trending/movie/{$timeWindow}");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    public function getMovieDetails($movieId)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey
        ])->get("https://api.themoviedb.org/3/movie/{$movieId}");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
