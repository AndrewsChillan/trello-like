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
            <h2>
                <form action="{{ route('trellos.update', ['id' => $project->id]) }}" method="POST">
                    @csrf

                    @method('put')
                    <p><input class="inputProjectTitle" type="text" name="title" value="{{ $project->title }}"></p>
                </form>
            </h2>

            <p>Project n°{{ $project->id}}</p>
            <p>Date de création: {{ $project->created_at }}</p>
            <p>Dernière modification: {{ $project->updated_at }}</p>
            
            {{-- <p><a href="{{ route('trellos.show', ['id' => $project->id]) }}">Afficher</a></p> --}}
            <p>
            <a class="btn btn-primary" href="{{ route('trellos.show', ['id' => $project->id]) }}" role="button">Afficher</a>
            
            <form action="{{ route('trellos.destroy', ['id' => $project->id]) }}" method="post">
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
            
