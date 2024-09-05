@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $movie['title'] }}</h1>
    <p><strong>Résumé : </strong>{{ $movie['overview'] }}</p>
    <p><strong>Date de sortie : </strong>{{ $movie['release_date'] }}</p>
    <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
    <p><strong>Note : </strong>{{ $movie['vote_average'] }} / 10</p>
</div>
@endsection
