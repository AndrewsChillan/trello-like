@extends('layouts.layout-trello')
        





{{-- Récupération des données BDD pour la table projets --}}
@auth
@section('projects-display')

@if(isset($projects))
@foreach ($projects as $project)
    
        <section class="project" style="background-image: url('{{ asset('image/' . $project->image_path)}}'); background-size: cover; background-repeat: no-repeat;}";>
            <h2>
                <form action="{{ route('trellos.update', $project->id) }}" method="POST">
                    @csrf

                    @method('put')
                    <p><input style="text-transform: capitalize" class="inputProjectTitle" type="text" name="title" value="{{ $project->title }}"></p>
                </form>
            </h2>
           <br>
           <br>
            {{-- <p><a href="{{ route('trellos.show', ['id' => $project->id]) }}">Afficher</a></p> --}}
            <p>
            <a class="btn btn-primary" href="{{ route('trellos.show', $project->id) }}" role="button">Afficher</a>
            
            <form action="{{ route('trellos.destroy', $project->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            </p>
        </section>
   
    @endforeach
    @endif
@endsection
{{-- @endsection --}}

{{-- Bouton d'ajout de projet --}}
@section('add-btn')
<form id="addProject"  action="{{route('trellos.create')}}">
<button type="submit" class="btn btn-primary">Ajouter un projet</button>
</form>

@endsection

{{-- Faire page pour les deconnectés --}}

@endauth

@section('pas auth')
    @if (!Auth::user())
    <div class="bgWelcome">
        <h2>Bienvenue sur Trello-like !</h2>
    </div>
    @endif
@endsection
            
