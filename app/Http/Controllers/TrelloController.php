<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Statut;
use App\Models\Card;



class TrelloController extends Controller
{
    public function index()
    {
        // récupération de toutes la table projets en passant par 
        // le Model / la classe "Projets" en connexion avec la BDD
        $projects = Project::all();


        return view('welcome', compact('projects'));
    }


    public function create()
    {
        return view('trellos.create');
    }


    public function store(Request $request)
    {

        // Validation de formulaire avant envoie dans la BDD
        $request->validate([
            'title' => 'required|string|max:50',

        ]);

        // Remplissage (préparation) de la table projets en BDD
        // ("colonne" => nouvelle data)
        $project = [
            "title" => $request->title,
            'user_id' => Auth::user()->id,
        ];

        // création de la nouvelle ligne avec les nouvelles data
        // dans la table projets
        Project::create($project);

        // redirection vers la page index
        return redirect()->route('projects.index');
    }


    public function show($id)
    {
        $project = Project::find($id);

        $statut = Statut::all();

        return view('projects.index', compact('project', 'statut'));
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
