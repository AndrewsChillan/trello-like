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
        @foreach ($statuts as $key => $statut)
            <article class="statutOfProject">  
                <h3>{{ $statut->project_id }}</h3>
                <div class="containerCards">
                    @foreach ($statut->cards as $key => $value)
                    <div class="cardOfStatut">
                        <span>{{$value->content}}</span>
                        <div>
                            <button><a href="">M</a></button>
                            <button><a href="">S</a></button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button><a href="">Ajouter</a></button>
            </article>
        @endforeach
    </section>
@endsection