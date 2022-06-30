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

        $statut1 =[
            "statut" => 'A faire',
            "project_id" => ($project = $this->id)        
        ];
        $statut2 =[
            "statut" => 'En cours',
            "project_id" => ($project = $this->id)  
        ];
        $statut3 =[
            "statut" => 'Terminé', 
            "project_id" => ($project = $this->id) 
        ];

        // création de la nouvelle ligne avec les nouvelles data
        // dans la table projets
        Project::create($project);
        Statut::create($statut1);
        Statut::create($statut2);
        Statut::create($statut3);


        // redirection vers la page index
        return redirect()->route('trellos.index');
    }

   
    public function show($id)
    {
        $project = Project::with('statuts.cards')->find($id);
        $statuts = $project->statuts;

        return view('trellos.show', compact('statuts'));
    }


    public function edit($id)
    {   
        $project = Project::find($id);
        return view('trellos.edit', compact('project'));
    }


    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->title = $request->title;

        $project->save();

        return redirect()->route('trellos.index');
    }


    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('trellos.index');
    }
}
