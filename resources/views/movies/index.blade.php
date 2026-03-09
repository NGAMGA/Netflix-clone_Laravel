@extends('layouts.app')

@section('content')
<div class="container-fluid bg-dark text-white min-vh-100 p-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="fw-bold text-danger" style="letter-spacing: 2px;">NETFLIX CLONE</h1>
        @auth
            <div class="d-flex justify-content-end mb-4 px-4">
        <a href="{{ route('movies.create') }}" class="btn btn-danger fw-bold shadow">
            + AJOUTER UN NOUVEAU FILM
        </a>
    </div>
        @endauth
        
        <form action="{{ route('movies.index') }}" method="GET" class="d-flex w-25">
            <select name="genre" class="form-select bg-secondary text-white border-0 me-2">
                <option value="">Tous les genres</option>
                <option value="Action">Action</option>
                <option value="Drama">Drama</option>
                <option value="Crime">Crime</option>
                
            </select>
            <button type="submit" class="btn btn-danger text-uppercase fw-bold">Filtrer</button>
        </form>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
        @foreach($movies as $movie)
            <div class="col">
                <div class="card h-100 bg-black border-0 shadow-lg movie-card">
                    
                    <img src="{{ $movie->image_url ?? 'https://via.placeholder.com/300x450' }}" 
                         class="card-img-top rounded shadow" 
                         alt="{{ $movie->title }}"
                         style="object-fit: cover; height: 350px;">
                    
                    <div class="card-body px-0 pt-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="card-title fw-bold mb-0 text-truncate" style="max-width: 80%;">{{ $movie->title }}</h6>
                            <span class="badge bg-warning text-dark">{{ $movie->rating }}</span>
                        </div>
                        <p class="small text-muted mb-2">{{ $movie->year }} | {{ $movie->duration }}</p>
                        
                        <div class="d-flex gap-2">
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-outline-light btn-sm w-100">Détails</a>
                            
                            @auth
                                
                                <button class="btn btn-danger btn-sm" title="Ajouter à ma liste">+</button>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .movie-card { transition: transform 0.3s ease; cursor: pointer; }
    .movie-card:hover { transform: scale(1.05); z-index: 10; }
    body { background-color: #141414 !important; }
</style>
@endsection