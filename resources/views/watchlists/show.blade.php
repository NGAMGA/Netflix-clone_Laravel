@extends('layouts.app')

@section('content')
<div class="container py-5 text-white">

<div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-black rounded border border-secondary shadow-sm">
    <h2 class="text-white fw-bold mb-0">
        <span class="text-danger">MA LISTE :</span> {{ $watchlist->name }}
    </h2>
    <div class="d-flex gap-2">
        
        <a href="{{ route('watchlists.index') }}" class="btn btn-sm btn-info fw-bold text-dark">
             Mes listes
        </a>
        <a href="{{ route('movies.index') }}" class="btn btn-sm btn-danger fw-bold">
             Catalogue
        </a>
    </div>
</div>

    @if(session('success'))
        <div class="alert alert-success bg-success text-white border-0 shadow-sm mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card bg-dark border-secondary shadow-lg">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0">
                <thead class="table-black">
                    <tr>
                        <th scope="col" style="width: 45%;" class="ps-4">Film</th>
                        <th scope="col" class="text-center">Année</th>
                        <th scope="col" class="text-center">Priorité</th> 
                        <th scope="col" class="text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($watchlist->movies as $movie)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $movie->image_url }}" alt="" class="rounded me-3 shadow-sm" style="width: 50px; height: 75px; object-fit: cover; border: 1px solid #444;">
                                    <div>
                                        <div class="fw-bold fs-5">{{ $movie->title }}</div>
                                        <small class="text-info">{{ Str::limit($movie->genres, 40) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center small">{{ $movie->year }}</td>
                            <td class="text-center">
                                <span class="badge bg-danger px-3 py-2 shadow-sm">
                                    Niveau {{ $movie->pivot->priority }}
                                </span>
                            </td>
                            <td class="text-center pe-4">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-sm btn-outline-light">
                                        Détails
                                    </a>
                                    
                                    <form action="{{ route('watchlists.removeMovie', [$watchlist->id, $movie->id]) }}" method="POST" onsubmit="return confirm('Retirer ce film de la liste ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Retirer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <div class="mb-3">
                                    <i class="fas fa-film fa-3x mb-3 opacity-25"></i>
                                </div>
                                Aucun film dans cette liste. <br>
                                <a href="{{ route('movies.index') }}" class="text-danger fw-bold mt-2 d-inline-block">Parcourir le catalogue</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    body { background-color: #141414 !important; }
    .table-black { background-color: #000; }
    .table-hover tbody tr:hover { background-color: #222 !important; }
    .badge { letter-spacing: 1px; font-weight: 600; }
    .card { border-radius: 15px; overflow: hidden; }
    .table th { font-weight: 700; text-transform: uppercase; font-size: 0.85rem; padding-top: 15px; padding-bottom: 15px; }
</style>
@endsection