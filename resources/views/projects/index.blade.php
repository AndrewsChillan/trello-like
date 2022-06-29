@extends('layouts.app')

@section('content')


<div class="container px-4">
    <div class="row gx-5">
        {{-- 1ère liste --}}
        <div class="col">
            <div class="p-3 border bg-light">
                <div class="container">
                    <div class="row">
                        <a class="btn btn-primary col-4" href="{{ route('projects.create') }}">Créer une carte</a>
                    </div>
                    <br>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">A faire</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($cards as $card)
                            <tr>
                                <th>{{ $card->id }}</th>
                                <td>{{ $card->content }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('projects.edit', $card->id) }}">Modifier la carte</a>

                                    <form action="{{ route('projects.destroy', $card->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger" type="submit">Supprimer la carte</button>                    
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      {{-- 2ème liste --}}
        <div class="col">
            <div class="p-3 border bg-light">
                <div class="container">
                    <div class="row">
                        <a class="btn btn-primary col-4" href="{{ route('projects.create') }}">Créer une carte</a>
                    </div>
                    <br>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">A faire</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($cards as $card)
                                <tr>
                                    <th>{{ $card->id }}</th>
                                    <td>{{ $card->content }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('projects.edit', $card->id) }}">Modifier la carte</a>

                                        <form action="{{ route('projects.destroy', $card->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger" type="submit">Supprimer la carte</button>                    
                                        </form>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      {{-- 3ème liste --}}
        <div class="col">
            <div class="p-3 border bg-light">
                <div class="container">
                    <div class="row">
                        <a class="btn btn-primary col-4" href="{{ route('projects.create') }}">Créer une carte</a>
                    </div>
                    <br>
                    <div class="row">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Terminée</th>
                            </tr>
                            </thead>
                            <tbody>
                               @foreach ($cards as $card)
                                <tr>
                                    <th colspan="2"> A faire</th>
                                </tr>
                                <tr>
                                    <th>{{ $card->id }}</th>
                                    <td>{{ $card->content }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('projects.edit', $card->id) }}">Modifier la carte</a>

                                        <form action="{{ route('projects.destroy', $card->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger" type="submit">Supprimer la carte</button>                    
                                        </form>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 