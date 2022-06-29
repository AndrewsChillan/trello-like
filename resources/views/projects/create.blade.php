@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Retour</a>
    </div>
    <div class="row">
        <form action="{{ route('projects.index') }}" method="POST">
            @csrf
            <input class="form-control" type="text" name="content" placeholder="Contenu...">
            <button type="submit" class="btn btn-success">Créer la carte</button>
        </form>
    </div>
</div>

@endsection 