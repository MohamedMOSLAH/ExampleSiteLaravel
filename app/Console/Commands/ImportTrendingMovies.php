<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;
use Illuminate\Support\Facades\Http;
use App\Services\MovieDBService;


class ImportTrendingMovies extends Command
{
    protected $signature = 'movies:import-trending';
    protected $description = 'Importer film avec API';
    

    public function handle(MovieDBService $movieDBService)
    {
        $response = $movieDBService->getTrendingMovies();

        if ($response !== null) {
            $movies = $response['results'];

            foreach ($movies as $movieData) {
                Movie::updateOrCreate(
                    [
                        'title' => $movieData['title'],
                        'overview' => $movieData['overview'],
                        'poster_path' => $movieData['poster_path'],
                        'release_date' => $movieData['release_date'],
                        'vote_average' => $movieData['vote_average']
                    ]
                );
            }

            $this->info('Importation films avec succès.');
        } else {
            $this->error('Erreur d\'importation.');
        }
    }
}
