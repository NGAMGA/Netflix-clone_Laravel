<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchlistController;

// Redirection de l'accueil vers le catalogue
Route::get('/', function () {
    return redirect()->route('movies.index');
});


Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

Auth::routes();

// 2. ROUTES PRIVÉES (Uniquement pour l'utilisateur connecté)
Route::middleware(['auth'])->group(function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Gestion des Watchlists (Privé)
    Route::resource('watchlists', WatchlistController::class);
    
    // Actions sur les films dans la liste
    
    Route::post('/watchlists/add-movie', [WatchlistController::class, 'addMovie'])->name('watchlists.addMovie');
    Route::delete('/watchlists/{watchlist}/remove-movie/{movie}', [WatchlistController::class, 'removeMovie'])->name('watchlists.removeMovie');

    // ADMINISTRATION DES FILMS (CRUD)
   
    // On définit uniquement les routes de création, modification et suppression.
    Route::get('/admin/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/admin/movies', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/admin/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/admin/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/admin/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
});
