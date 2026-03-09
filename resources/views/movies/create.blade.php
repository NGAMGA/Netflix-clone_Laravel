@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white border-secondary shadow-lg">
                <div class="card-header bg-black border-secondary p-3">
                    <h3 class="text-danger fw-bold mb-0">AJOUTER UN NOUVEAU FILM</h3>
                </div>
                <div class="card-body p-4 bg-dark">
                    <form action="{{ route('movies.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label fw-bold text-white">Titre du film</label>
                                <input type="text" name="title" class="form-control bg-black text-white border-secondary" placeholder="Ex: Inception" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-white">Année de sortie</label>
                                <input type="number" name="year" class="form-control bg-black text-white border-secondary" value="2024">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold text-white">URL de l'image (Poster)</label>
                                <input type="url" name="image_url" class="form-control bg-black text-white border-secondary" placeholder="https://image.tmdb.org/...">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-white">Genre</label>
                                <input type="text" name="genres" class="form-control bg-black text-white border-secondary" placeholder="Action, Drame...">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-white">Note (Note / 10)</label>
                                <input type="number" step="0.1" name="rating" class="form-control bg-black text-white border-secondary" placeholder="8.5">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold text-white">Synopsis / Description</label>
                                <textarea name="description" rows="4" class="form-control bg-black text-white border-secondary" placeholder="Résumé du film..."></textarea>
                            </div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary px-4">Annuler</a>
                            <button type="submit" class="btn btn-danger px-5 fw-bold shadow">PUBLIER LE FILM</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection