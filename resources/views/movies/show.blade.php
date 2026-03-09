@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow border-0 bg-dark text-white">
                
               <div class="card-header bg-black d-flex justify-content-between align-items-center p-3 border-secondary">
                <div class="d-flex align-items-center gap-3">
        
        <a href="{{ url()->previous() }}" class="text-secondary text-decoration-none shadow-sm me-2">
            <span class="fs-4">←</span>
        </a>
        <h2 class="mb-0 text-uppercase fw-bold text-danger">{{ $movie->title }}</h2>
    </div>
    
    <div class="d-flex align-items-center gap-3">
        @auth
            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-outline-warning">Modifier le film</a>
        @endauth
        <span class="badge bg-warning text-dark fs-5"> {{ $movie->rating }}</span>
    </div>
</div>
<div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-4 mb-4 text-center">
                            @if($movie->image_url)
                                <img src="{{ $movie->image_url }}" class="img-fluid rounded shadow border border-secondary" alt="{{ $movie->title }}" style="max-height: 450px;">
                            @else
                                <div class="bg-secondary d-flex align-items-center justify-content-center rounded shadow border border-secondary" style="height: 400px;">
                                    <span class="text-white">Pas d'image</span>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3 d-flex flex-wrap gap-2">
                                <span class="badge bg-secondary">Année : {{ $movie->year }}</span>
                                <span class="badge bg-info text-dark">Durée : {{ $movie->duration }}</span>
                                <span class="badge bg-outline-light border">{{ $movie->certificate }}</span>
                            </div>
                            
                            <h5 class="text-danger fw-bold">Genre</h5>
                            <p class="text-info">{{ $movie->genres }}</p>
                            
                            <hr class="border-secondary">
                            
                            <h5>Synopsis / Description</h5>
                            <p class="text-light lead" style="font-size: 1rem; line-height: 1.6;">
                                {{ $movie->description }}
                            </p>

                            @auth
                                <div class="mt-5 p-3 border border-secondary rounded bg-black shadow-sm">
                                    <h5 class="text-danger mb-3">Ajouter à une de mes listes</h5>
                                    
                                    @if(Auth::user()->watchlists->count() > 0)
                                        
                                        <form action="{{ route('watchlists.addMovie') }}" method="POST" class="row g-2 align-items-end">
                                            @csrf
                                            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                            
                                            <div class="col-md-6">
                                                <label class="small d-block mb-1 text-muted">Choisir la liste</label>
                                                
                                                <select name="watchlist_id" class="form-select form-select-sm bg-dark text-white border-secondary" required>
                                                    @foreach(Auth::user()->watchlists as $watchlist)
                                                        <option value="{{ $watchlist->id }}">{{ $watchlist->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label class="small d-block mb-1 text-muted">Priorité (1-5)</label>
                        
                                                <input type="number" name="priority" class="form-control form-control-sm bg-dark text-white border-secondary" value="1" min="1" max="5" required>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-danger btn-sm w-100 fw-bold">Ajouter</button>
                                            </div>
                                        </form>
                                    @else
                                        <p class="small text-muted mb-0">Vous n'avez pas encore de liste. <a href="{{ route('watchlists.index') }}" class="text-danger">Créez-en une ici</a>.</p>
                                    @endif
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-black p-3 border-secondary text-center">
                    <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary btn-sm">← Retour au catalogue</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body { background-color: #141414 !important; }
    .card { border-radius: 12px; }
    .form-select-sm, .form-control-sm { border-radius: 4px; }
</style>
@endsection