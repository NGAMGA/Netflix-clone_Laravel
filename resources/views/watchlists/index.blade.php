@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="text-danger fw-bold text-uppercase" style="letter-spacing: 2px;">
            MES LISTES <span class="text-white">DE FILMS</span>
        </h1>
        <a href="{{ route('watchlists.create') }}" class="btn btn-danger fw-bold px-4">
            + NOUVELLE LISTE
        </a>
    </div>

    <div class="row">
        @forelse($watchlists as $watchlist)
            <div class="col-md-4 mb-4">
                <div class="card bg-dark border-secondary shadow-lg h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center py-5">
                        <div class="mb-3">
                            <i class="fas fa-folder-open fa-3x text-info opacity-50"></i>
                        </div>
                        <h3 class="text-white fw-bold text-center px-2">{{ $watchlist->name }}</h3>
                        <p class="text-muted small">{{ $watchlist->movies->count() }} film(s) enregistré(s)</p>
                    </div>

                    <div class="card-footer bg-black border-secondary p-3 d-flex justify-content-between gap-1">
                        <a href="{{ route('watchlists.show', $watchlist->id) }}" class="btn btn-sm btn-info fw-bold flex-grow-1">Consulter</a>
                        
                        <a href="{{ route('watchlists.edit', $watchlist->id) }}" class="btn btn-sm btn-outline-warning flex-grow-1">Renommer</a>
                        
                        <form action="{{ route('watchlists.destroy', $watchlist->id) }}" method="POST" class="flex-grow-1" onsubmit="return confirm('Supprimer cette liste définitivement ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-white-50 fs-4">Vous n'avez pas encore créé de liste de films.</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    body { background-color: #141414 !important; }
    .card { transition: transform 0.3s ease; border-radius: 12px; }
    .card:hover { transform: translateY(-5px); border-color: #dc3545 !important; }
    .card-footer .btn { font-size: 0.75rem; }
</style>
@endsection