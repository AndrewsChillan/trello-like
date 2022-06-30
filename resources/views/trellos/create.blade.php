@extends('layouts.layout-trello')

@section('trello create')
    <form class="createProjectForm" action="{{ route('trellos.store') }}" method="post">
    @csrf
        <h2>Création d'un nouveau projet</h2>
        <br>
        <br>

        <label>Entrez le nom de votre projet:</label>
        <input type="text" name="title" placeholder="Nom du projet">

        <br>
        <br>
        <br>

        <p><button type="submit" class="btn btn-primary">Créer le projet</button></p>
    </form>    
@endsection