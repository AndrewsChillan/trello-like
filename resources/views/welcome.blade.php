@extends('/layouts/layout-trello')
        
@section('header')
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Trello-Like</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Profil</a>
                </li>
                
                <li>
                    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                            @if (Route::has('login'))
                            <div class="hidden fixed  sm:block">
                            @auth
                                
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                
                    @endif
                </div>
                </li>
            </ul>
            </div>
        </div>
    </nav>       
@endsection

{{-- Bouton d'ajout de projet --}}
@section('bouton-ajout-projet')
<button type="submit" class="btn btn-primary">Ajouter un projet</button>
@endsection


{{-- @section('header store')
    <h1>Projets</h1>    
@endsection --}}


{{-- Récupération des données BDD pour la table projets --}}
@auth
@section('affichage-projets')
    @foreach ($projets as $projet)
    <section class="projet">
        <h2>{{ $projet->title }}</h2>
        <p>Projet n°{{ $projet->id}}</p>
        <p>Date de création: {{ $projet->created_at }}</p>
        <p>Dernière modification: {{ $projet->updated_at }}</p>
        {{-- <a href="{{ route('blogs.show', ['id' => $post->id]) }}">Afficher</a> --}}
        {{-- <form action="{{ route('projet.destroy', ['id' => $projet->id]) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Supprimer">
        </form> --}}
    </section>
    @endforeach
@endsection
{{-- @endsection --}}

@section('footer')
<nav class="navbar bg-light">
  <div class="container-fluid">
    <span class="navbar-text">
     Copyright ©2022 Trello-Like.com Tous droits réservés - SARL Cacahuète
    </span>
  </div>
</nav>
@endsection

@endauth
            
