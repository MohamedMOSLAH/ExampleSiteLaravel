<?php

namespace App\Http\Controllers;

use App\Models\Movie;
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
        $movies = Movie::all();
        return view('movies.index', ['movies' => $movies]);
    }
    
    public function show($id)
    {
        $movie = Movie::find($id);
        
        if (!$movie) {
            abort(404);
        }

        return view('movies.show', ['movie' => $movie]);
    }

}
