@extends('/layouts/layout-trello')
        


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
    
        <section class="project">
            <h2>{{ $project->title }}</h2>
            <p>Project n°{{ $project->id}}</p>
            <p>Date de création: {{ $project->created_at }}</p>
            <p>Dernière modification: {{ $project->updated_at }}</p>
            
            <p><a href="{{ route('trellos.show', ['id' => $project->id]) }}">Afficher</a></p>
            

            {{-- <a href="{{ route('blogs.show', ['id' => $post->id]) }}">Afficher</a> --}}
            <form action="{{ route('trellos.destroy', ['id' => $project->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </section>
   
    @endforeach
    @endif
@endsection
{{-- @endsection --}}



@endauth
            
