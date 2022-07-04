@extends('layouts.layout-trello')

@auth
    @section('profile-form')

    <section class="profileBg">
        

        {{-- Formulaire de modification de données Profil utilisateur --}}
    
        <section class="profile">

            <h1>Votre profil</h1>

            <br>

            <form id="profilForm" action="{{ route('profiles.update', ['id' => $profile->id]) }}" method="POST">
            @csrf

            @method('put')
            <input class="inputBg" type="text" name="name" value="{{ $profile->name }}">
            
            <input class="inputBg" type="text" name="email" value="{{ $profile->email }}">
           
            <button type="submit" class="btn btn-primary">Valider les modifications</button>

            
            
        </section>
        
    </section>  
        
    @endsection
@endauth