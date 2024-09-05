<?php

namespace App\Http\Controllers;

use App\Services\MovieDBService;

class MovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieDBService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index()
    {
        $movies = $this->movieService->getTrendingMovies('day');
        return view('movies.index', ['movies' => $movies['results']]);
    }
    
    public function show($id)
    {
        $movie = $this->movieService->getMovieDetails($id);
        
        if (!$movie) {
            abort(404);
        }

        return view('movies.show', ['movie' => $movie]);
    }

}
