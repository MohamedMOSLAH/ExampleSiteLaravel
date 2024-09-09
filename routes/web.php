<?php

use App\Livewire\MovieCrud;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/', [MovieController::class, 'index'])->name('movies.index')->withoutMiddleware([/* middlewares jetstream, si applicable */]);
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');

Route::middleware(['auth'])->group(function () {

Route::get('/movies-crud', MovieCrud::class)->name('movies.crud');
});