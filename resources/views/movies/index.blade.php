@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Films tendances</h1>
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
                    <div class="card-body">
                       {{ json_encode($movie) }}
                        <h5 class="card-title">{{ $movie['title'] }}</h5>
                        <p class="card-text">{{ $movie['overview'] }}</p>
                        <a href="{{ route('movies.show', $movie['id']) }}" class="btn btn-primary">Voir les détails</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
