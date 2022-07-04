@extends('layouts.layout-trello')

@section('trello create')
<section id="bgProjectCreation">
    <form class="createProjectForm" action="{{ route('trellos.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <h2>Création d'un nouveau projet</h2>
        <br>
        <br>
        
        <label>Entrez le nom de votre projet:</label>

        <input class="inputBg" type="text" name="title" placeholder="Nom du projet">

        <br>
        
        <br>

        <input type="file" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="image">

        <br>
        <br>
        <br>

        <p><button type="submit" class="btn btn-primary">Créer le projet</button></p>
        <p><button type="button" class="btn btn-light" id="returnBtn"> <a id="returnLink"  href="{{ route('trellos.index')}}"> Retour</a></button></p>

        {{-- <button type="button" id="returnProjectBtn"> <a  href="{{ route('trellos.index')}}"> < Mes projets</a></button> --}}
    </form>  
</section>  
@endsection

