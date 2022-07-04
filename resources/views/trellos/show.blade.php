<?php use App\Models\Card; ?>

@extends('layouts.layout-trello')

@section('content')
    {{-- En attendant le style final --}}
    <style>
        body {
            background-image: url('{{ asset('image/' . $project->image_path)}}');
            background-repeat: no-repeat;
            background-size: cover;
            
        }
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
            border-radius: 5px;
        }

        .formDeleteList{
            position: relative;
            top: 50px;
            right: -100px;
            margin-top: -60px;
        }

        .deleteList {
            border-radius: 30px;
            width: 30px;
            
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
            align-items: flex-start;
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
            @if ($statut->statut != 'A faire' && $statut->statut != 'En cours' && $statut->statut != 'Terminé')
                <form class="formDeleteList" method="post" action="{{ route('projects.deletelist', ['statut_id' => $statut->id, 'project' => $project->id, 'test' => 'delete'])}}">
                @csrf
                @method('delete')
                    <button class="deleteList">X</button>
                </form>
                
            @endif
            
            <h3>{{ $statut->statut }}</h3>
            <div class="containerCards">

                    @foreach ($statut->cards as $indexCard => $card)
                    
                    <div class="cardOfStatut">

                        

                        <span>{{$card->content}}</span>
        
                        <div style="display: flex; gap: 5px;">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Modifier une tâche</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form id="formEditCard" action="{{route('projects.update',$project->id)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="text" name="content_card" value="{{ $statut->cards[$indexCard]->content ?? '' }}" placeholder="Contenu"> 
                                            <select name="statut_modif_card">
                                                @foreach ($project->statuts as $value)
                                                <option value={{$value->id}} <?php if ($card->statut_id == $value->id) echo "selected"; ?>>{{$value->statut}}</option>
                                                @endforeach
                                            </select>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une tâche</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{route('projects.store.id', $project->id)}}" method="post">
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

        {{-- AJOUTER NEW LIST --}}

        <button type="button" data-bs-toggle="modal" data-bs-target="#modalAjouterList-<?= $project->id ?>">Ajouter une liste</button>

        <!-- Modal Ajouter Liste-->
                    <div class="modal fade" id="modalAjouterList-<?= $project->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une liste</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{ route('projects.addList', ['test' => 'statut', 'project' => $project->id]) }}" method="post">
                                        @csrf
                                        <input type="text" name="new_statut" placeholder="Nouvelle liste">
                                        <button type="submit">Créer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

    </section>
@endsection