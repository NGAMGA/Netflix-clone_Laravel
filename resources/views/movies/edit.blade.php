@extends('layouts.app')

@section('content')
<div class="container py-5 text-white">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark border-secondary shadow-lg">
                <div class="card-header bg-black border-secondary d-flex justify-content-between align-items-center">
                    <h4 class="text-warning fw-bold mb-0">MODIFIER : {{ $movie->title }}</h4>
                    
                    
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Supprimer définitivement ce film du catalogue ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer le film</button>
                    </form>
                </div>
                
                <div class="card-body p-4">
                    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label small text-muted">Titre</label>
                                <input type="text" name="title" class="form-control bg-black text-white border-secondary" value="{{ old('title', $movie->title) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small text-muted">Année</label>
                                <input type="number" name="year" class="form-control bg-black text-white border-secondary" value="{{ old('year', $movie->year) }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label small text-muted">URL de l'image</label>
                                <input type="url" name="image_url" class="form-control bg-black text-white border-secondary" value="{{ old('image_url', $movie->image_url) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Genres</label>
                                <input type="text" name="genres" class="form-control bg-black text-white border-secondary" value="{{ old('genres', $movie->genres) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">Note</label>
                                <input type="number" step="0.1" name="rating" class="form-control bg-black text-white border-secondary" value="{{ old('rating', $movie->rating) }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label small text-muted">Description</label>
                                <textarea name="description" rows="4" class="form-control bg-black text-white border-secondary">{{ old('description', $movie->description) }}</textarea>
                            </div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-outline-secondary">Annuler</a>
                            <button type="submit" class="btn btn-warning px-5 fw-bold text-dark shadow">SAUVEGARDER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection