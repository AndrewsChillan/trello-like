<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
   <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   

    <!--CSS-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>

    <!--FONT AWESOME-->
    <script
      src="https://kit.fontawesome.com/7cdacc82b4.js"
      crossorigin="anonymous"
    ></script>
    
    <title>TRELLO LIKE</title>
</head>
<body>

<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary"; color: white;>
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('trellos.index')}}"><strong>Trello-Like</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        @auth
                        <a class="nav-link active" aria-current="page" href="{{ route('profiles.edit', ["id" => $profiles = Auth::user()->id]) }}">Profil</a>
                        @endauth
                    </li>
                    
                    <li>
                        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                                @if (Route::has('login'))
                                <div class="hidden fixed  sm:block">
                                    @auth
                                        
                                    @else
                                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Se connecter</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class=" text-sm text-gray-700 dark:text-gray-500 underline">S'inscrire</a>
                                        @endif
                                    @endauth
                                </div>
                    
                                @endif
                        </div>
                    </li>
                @auth
                    <li class="nav-item dropdown">
                        
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 Dashboard de {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                    </li>
                    @endauth
                
                </ul>
            </div>
        </div>
    </nav>       

</header>

<main>


@yield('trello create')

@yield('profile-form')
@yield('content')
@yield('pas auth')



<section class="projectsContainer">
    @yield('projects-display')
</section>

@yield('add-btn')
</main>

<footer>
<nav id="footerNav" class="navbar bg-primary">
  <div class="container-fluid" style="justify-content: center;">
 
        <span class="navbar-text">
           Copyright ©2022 Trello-Like.com Tous droits réservés - SARL Cacahuète
        </span>
    
  </div>
</nav>
</footer>



    
</body>
</html>
