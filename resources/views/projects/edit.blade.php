@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Retour</a>
    </div>
    <div class="row">
        <form action="{{ route('projects.update', ["id" => $card->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <input class="form-control" type="text" name="content" placeholder="Contenu..." value="{{ $card->content ?? '' }}">
            <button type="submit" class="btn btn-success">Modifier le post</button>
        </form>
    </div>
</div>

@endsection