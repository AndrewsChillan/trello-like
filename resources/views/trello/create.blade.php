@extends('layouts.layout-trello')

@section('trello create')
    <form action="{{ route('trellos.store') }}" method="post">
    @csrf
        <input type="text" name="title_projet" placeholder="Nom du projet">
        <input type="submit" value="créer">
    </form>    
@endsection