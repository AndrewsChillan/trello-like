@extends('/layouts/layout-trello')

@auth
    @section('profile-form')
        <h1>Votre profil</h1>

        @if(isset($profiles))
        @foreach ($profiles as $profile)
    
        <section class="profile">
            <p>Votre nom: {{ $profile->name }}</p>
            <p>Votre email: {{ $profile->email}}</p>
        </section>
        
        @endforeach
        @endif
    @endsection
@endauth

