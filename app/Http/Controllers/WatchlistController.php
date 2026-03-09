<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller 
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // LISTER SES WATCHLISTS
    public function index()
{
    $watchlists = Auth::user()->watchlists; 
    
    return view('watchlists.index', compact('watchlists'));
}

    // CRÉER UNE WATCHLIST
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Auth::user()->watchlists()->create([
        'name' => $request->name
    ]);

    
    return redirect()->route('watchlists.index')->with('success', 'Liste créée avec succès !');
}

    // VOIR LE CONTENU D'UNE WATCHLIST
    public function show(Watchlist $watchlist)
    {
        // Sécurité
        if ($watchlist->user_id !== Auth::id()) { abort(403); }
        
        return view('watchlists.show', compact('watchlist'));
    }

    // MODIFIER UNE WATCHLIST

       public function edit(Watchlist $watchlist)
{
    
    if ($watchlist->user_id !== auth()->id()) {
        abort(403);
    }
    return view('watchlists.edit', compact('watchlist'));
}

    public function update(Request $request, Watchlist $watchlist)
{
    // 1. Validation du nouveau nom
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // 2. Mise à jour en base de données
    $watchlist->update([
        'name' => $request->name
    ]);

    
    return redirect()->route('watchlists.index')->with('success', 'Liste renommée avec succès !');
}
    // SUPPRIMER UNE WATCHLIST
    public function destroy(Watchlist $watchlist)
    {
        if ($watchlist->user_id !== Auth::id()) { abort(403); }
        
        $watchlist->delete();
        return redirect()->route('watchlists.index')->with('success', 'Liste supprimée !');
    }
    
    // RETIRER UN FILM
    public function removeMovie(Watchlist $watchlist, $movieId)
    {
        if ($watchlist->user_id !== Auth::id()) { abort(403); }

        $watchlist->movies()->detach($movieId);

        return redirect()->back()->with('success', 'Le film a été retiré de votre liste.');
    }

    public function addMovie(Request $request)
{
    $request->validate([
        'watchlist_id' => 'required|exists:watchlists,id',
        'movie_id'     => 'required|exists:movies,id',
        'priority'     => 'required|integer|min:1|max:5',
    ]);

    $watchlist = Watchlist::findOrFail($request->watchlist_id);

    // Attacher le film à la liste choisie avec sa priorité
    $watchlist->movies()->syncWithoutDetaching([
        $request->movie_id => ['priority' => $request->priority]
    ]);

    return redirect()->back()->with('success', 'Film ajouté à la liste ' . $watchlist->name);
}


/**
 * Affiche le formulaire pour créer une nouvelle liste (Watchlist)
 */
public function create()
{
    return view('watchlists.create');
}
}