<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;


class MovieController extends Controller

{

    // Lister tous les modèles + Filtrer

   public function index(Request $request)

{

    $query = Movie::query();

    // Filtrer par genre

    if ($request->has('genre') && $request->genre != '') {

        $query->where('genres', 'like', '%' . $request->genre . '%');

    }

    // On récupère les films de manière aléatoire pour l'effet "Netflix"

    $movies = $query->inRandomOrder()->get();

    return view('movies.index', compact('movies'));

}

public function show($id)

{
    $movie = Movie::findOrFail($id);

    return view('movies.show', compact('movie'));
}


// Affiche le formulaire de création
public function create()
{
    return view('movies.create');
}

// Enregistre le nouveau film dans la base
public function store(Request $request)
{
    // 1. LA VALIDATION 
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'year'        => 'required|integer|min:1880|max:2026',
        'rating'      => 'required|numeric|min:0|max:10',
        'genres'      => 'required|string',
        'description' => 'required|string|min:10',
        'image_url'   => 'nullable|url',
    ]);

    // 2. LA CRÉATION (On utilise uniquement les données validées)
    Movie::create($validated);

    
    return redirect()->route('movies.index')->with('success', 'Le film a été ajouté au catalogue avec succès !');
}

// Affiche le formulaire de modification
public function edit($id)
{
    $movie = Movie::findOrFail($id);
    return view('movies.edit', compact('movie'));
}

public function update(Request $request, Movie $movie)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'year' => 'required|integer',
        'rating' => 'required|numeric|min:0|max:10',
        'genres' => 'required|string',
        'description' => 'required|string',
        'image_url' => 'nullable|url',
    ]);

    $movie->update($validated);

    return redirect()->route('movies.show', $movie->id)->with('success', 'Le film a été mis à jour avec succès.');
}

public function destroy(Movie $movie)
{
    $movie->delete();

    return redirect()->route('movies.index')->with('success', 'Le film a été définitivement retiré du catalogue.');
}
}
