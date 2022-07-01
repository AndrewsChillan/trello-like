@extends('layouts.layout-trello')

@section('content')

<div class="container">
    <div class="row">
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Retour</a>
    </div>
    <div class="row">
        <input type="file" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="image">
        <form action="{{ route('projects.index') }}" method="POST">
            @csrf
            <input class="form-control" type="text" name="content" placeholder="Contenu...">
            <button type="submit" class="btn btn-success">Créer la carte</button>
        </form>
    </div>
</div>

@endsection 