<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Statut;





class TrelloController extends Controller
{
    public function index()
    {
        // récupération de toutes la table projets en passant par 
        // le Model / la classe "Projets" en connexion avec la BDD
        $projects = null;
        if (null !== Auth::user()) {
            $projects = Project::where('user_id', Auth::user()->id)->get();
        }

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
            'title' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        $newImageName = '';
        if (isset($request->image)) {
            $newImageName = time() . '-' . $request->title . '.' .
                $request->image->extension();

            $request->image->move(public_path('image'), $newImageName);
        }

        // Remplissage (préparation) de la table projets en BDD
        // ("colonne" => nouvelle data)
        $project = [
            "title" => $request->title,
            'user_id' => Auth::user()->id,
            'image_path' => $newImageName
        ];


        $newProject = Project::create($project);

        $statut1 = [
            "statut" => 'A faire',
            "project_id" => $newProject->id,
        ];
        $statut2 = [
            "statut" => 'En cours',
            "project_id" => $newProject->id,
        ];
        $statut3 = [
            "statut" => 'Terminé',
            "project_id" => $newProject->id
        ];

        // création de la nouvelle ligne avec les nouvelles data
        // dans la table projets

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
        return view('trellos.show', compact('statuts', 'project'));
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
