<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function edit()
    {
        // récupération des informations de la table users
        // le Model / la classe "User" en connexion avec la BDD
        $profiles = Auth::user()->id;


        return view('profil.edit');
    }
}
