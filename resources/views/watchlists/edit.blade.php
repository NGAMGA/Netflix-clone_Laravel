@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-dark text-white border-secondary shadow-lg">
                <div class="card-header bg-black border-secondary p-3">
                    <h4 class="text-warning fw-bold mb-0">RENOMMER LA LISTE</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('watchlists.update', $watchlist->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label text-white fw-bold">Nouveau nom</label>
                            <input type="text" name="name" class="form-control bg-black text-white border-secondary" value="{{ $watchlist->name }}" required>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('watchlists.index') }}" class="btn btn-outline-secondary">Annuler</a>
                            <button type="submit" class="btn btn-warning px-4 text-dark fw-bold">ENREGISTRER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection