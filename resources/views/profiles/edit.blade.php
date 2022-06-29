@extends('/layouts/layout-trello')

@auth
    @section('profile-form')

    <section class="profileForm">
        <h1>Votre profil</h1>

        <br>

        {{-- Formulaire de modification de données Profil utilisateur --}}
    
        <section class="profile">

            <form action="{{ route('profiles.update', ['id' => $profile->id]) }}" method="POST">
            @csrf

            @method('put')
            <p><input type="text" name="name" value="{{ $profile->name }}"></p>
            <br>
            <p><input type="text" name="email" value="{{ $profile->email }}"></p>
            <br>
            <p><button type="submit" class="btn btn-primary">Valider les modifications</button></p>

            
            
        </section>
        
    </section>  
        
    @endsection
@endauth