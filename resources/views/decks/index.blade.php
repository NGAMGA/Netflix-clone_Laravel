@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Decks</h1>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('decks.store') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="name" class="form-control" placeholder="Nom du nouveau deck (ex: BADASS)" required>
                    <button type="submit" class="btn btn-primary">Créer le deck</button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="list-group">
        @foreach($decks as $deck)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('decks.show', $deck->id) }}" class="fw-bold">{{ $deck->name }}</a>
                
                <div class="btn-group">
                    
                    <form action="{{ route('decks.destroy', $deck->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce deck ?')">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection