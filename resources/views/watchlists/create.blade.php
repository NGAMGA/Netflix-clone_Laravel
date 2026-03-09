@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-dark text-white border-secondary shadow-lg">
                <div class="card-header bg-black border-secondary p-3">
                    <h3 class="text-danger fw-bold mb-0 text-uppercase" style="letter-spacing: 1px;">
                        Créer une nouvelle liste
                    </h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('watchlists.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold text-white">Nom de la liste</label>
                            <input type="text" name="name" id="name" 
                                   class="form-control bg-black text-white border-secondary @error('name') is-invalid @enderror" 
                                   placeholder="Ex: Mes films d'horreur préférés" 
                                   value="{{ old('name') }}" required>
                            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('watchlists.index') }}" class="btn btn-outline-secondary px-4">
                                Annuler
                            </a>
                            <button type="submit" class="btn btn-danger px-4 fw-bold shadow">
                                CRÉER LA LISTE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body { background-color: #141414 !important; }
    .card { border-radius: 12px; }
    .form-control:focus {
        background-color: #000;
        color: white;
        border-color: #dc3545;
        box-shadow: 0 0 0 0.25 dir-shadow rgba(220, 53, 69, 0.25);
    }
</style>
@endsection