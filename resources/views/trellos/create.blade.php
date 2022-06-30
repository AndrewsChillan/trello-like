@extends('layouts.layout-trello')

@section('trello create')
<form action="{{ route('trellos.store') }}" method="post">
    @csrf
    <input type="text" name="title" placeholder="Nom du projet">
        <select name="statuts" id="statuts">
          
          
             <option value="{{ $statut->id }}">{{ $statut->statut }}</option>
          
          
        </select>
        <input type="submit" value="créer">
    </form>
    @endsection