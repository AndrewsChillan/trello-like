@extends('layouts.layout-trello')

@section('content')
            <section class="log" style="width: 40%">
                <h2>S'inscrire</h2>
                    <form id="formRegister" method="POST" action="{{ route('register') }}">
                        @csrf

                            <div class="divFormRegister">
                                <label for="name" >Nom</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            

                            <div class="divFormRegister" >
                                <label for="email" >E-mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           

                            <div class="divFormRegister" >
                                <label for="password" >Mot de passe</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            <div class="divFormRegister" >
                                <label for="password-confirm" >Confirmation du mot de passe</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            
                                <button type="submit" class="btn btn-primary">
                                    S'inscrire
                                </button>
                           
                    </form>
                </section>
@endsection
