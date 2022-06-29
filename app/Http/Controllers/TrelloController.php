<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Projects;
use App\Models\Lists;
use App\Models\Cards;


class TrelloController extends Controller
{
    public function index()
    {
        // récupération de toutes la table projets en passant par 
        // le Model / la classe "Projets" en connexion avec la BDD
        $projects = Projects::all();


        return view('welcome', compact('projects'));
    }


    public function create()
    {
        return view('trello.create');
    }


    public function store(Request $request)
    {

        // Validation de formulaire avant envoie dans la BDD
        $request->validate([
            'title_projet' => 'required|string|max:50',

        ]);

        // Remplissage (préparation) de la table projets en BDD
        // ("colonne" => nouvelle data)
        $projet = [
            "title" => $request->title_projet,
            'user_id' => Auth::user()->id,
        ];

        // création de la nouvelle ligne avec les nouvelles data
        // dans la table projets
        Projects::create($projet);

        // redirection vers la page index
        return redirect()->route('trellos.index');
    }


    public function show($id)
    {
        $projet = Projects::find($id);
        $listes = Lists::all();
        return view('projets.index', compact('projet', 'listes'));
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
    }
}
