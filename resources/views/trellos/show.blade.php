@extends('layouts.layout-trello')

@section('content')
    {{-- En attendant le style final --}}
    <style>
        h3{
            text-transform: capitalize;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        button{
            background: white;
            border: 2px solid blue;
            border-radius: 5px
        }
        button:hover{
            background: blue;
            border: 2px solid white;
        }
        button:hover a {
            color: white;
        }
        .containerStatuts{
            display: flex;
            gap: 2%;
            padding: 3%;
        }
        .statutOfProject {
            width: 20%;
            padding: 2%;
            border: 1px solid lightgrey; 
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
            background: #f1f3f4;
            justify-content: space-between;
        }
        .containerCards{
            width: 100%;
            display:flex;
            flex-direction: column;
            gap: 10px
        }
        .cardOfStatut{
            padding: 5%;
            background: white;
            border-radius: 5px;
            border: 1px solid lightgrey;
            display: flex;
            justify-content: space-between;
        }
    </style>
    <section class="containerStatuts">
        @foreach ($statuts as $indexStatut => $statut)
        
        
            <article class="statutOfProject">  
                <h3>{{ $statut->statut }}</h3>
                <div class="containerCards">

                    @foreach ($statut->cards as $indexCard => $card)
                    <div class="cardOfStatut">

                        <span>{{$card->content}}</span>
        
                        <div>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalModifier-<?= $card->id ?>">M</button>
                            <form action="{{ route('projects.destroy.id', ['id' => $card->id, 'project' => $project->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">S</button>
                            </form>
                        </div>
                        
                        <!-- Modal Modifier-->
                        <div class="modal fade" id="modalModifier-<?= $card->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form id="formEditCard" action="{{route('projects.update',[$project->id])}}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="text" name="content_card" value="{{ $statut->cards[$indexCard]->content ?? '' }}" placeholder="Contenu"> 
                                            <input type="hidden" name="id_card" value="{{$card->id}}">   
                                            <button type="submit">Enregistrer</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modalAjouter-<?= $statut->id ?>">Ajouter</button>
            </article>

            <!-- Modal Ajouter -->
                    <div class="modal fade" id="modalAjouter-<?= $statut->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{route('projects.store.id', [$project->id])}}" method="post">
                                        @csrf
                                        <input type="text" name="new_card" placeholder="Contenu">  
                                        <input type="hidden" name="id_statut" value="{{ $statut->id }}"> 
                                        <button type="submit">Créer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        @endforeach
    </section>

@endsection