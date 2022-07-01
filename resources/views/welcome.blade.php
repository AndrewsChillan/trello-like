@extends('layouts.layout-trello')
        


{{-- Bouton d'ajout de projet --}}
@section('add-btn')
<form  action="{{route('trellos.create')}}">
<button type="submit" class="btn btn-primary">Ajouter un projet</button>
</form>

@endsection





{{-- Récupération des données BDD pour la table projets --}}
@auth
@section('projects-display')

@if(isset($projects))
@foreach ($projects as $project)
    
        <section class="project" style="background-image: url('{{ asset('image/' . $project->image_path)}}'); background-size: contain;
}";>
            <h2>
                <form action="{{ route('trellos.update', $project->id) }}" method="POST">
                    @csrf

                    @method('put')
                    <p><input class="inputProjectTitle" type="text" name="title" value="{{ $project->title }}"></p>
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



@endauth
            
