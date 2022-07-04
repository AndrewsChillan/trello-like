<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Statut;

use Illuminate\Http\Request;

class ProjectController extends Controller
{


    public function store(Request $request,  $statut)
    {
        // Validation de formulaire avant envoie dans la BDD
        $request->validate([
            'new_card' => 'required|string',
            'id_statut' => 'required|integer'
        ]);

        $card = [
            'content' => $request->input('new_card'),
            'statut_id' => $request->input('id_statut')
        ];

        Card::create($card);
        return redirect()->route('trellos.show', $statut);
    }


    public function addList(Request $request, $test, $project)
    {

        // Validation de formulaire avant envoie dans la BDD
        $request->validate([
            'new_statut' => 'required|string',
        ]);

        $newStatut = [
            'statut' => $request->input('new_statut'),
            'project_id' => $project
        ];

        Statut::create($newStatut);
        return redirect()->route('trellos.show', $project);
    }


    public function update(Request $request, $id)
    {
        // Validation de formulaire avant envoie dans la BDD
        $request->validate([
            'content_card' => 'required|string',
            'statut_modif_card' => 'required|integer'
        ]);

        $project = $id;
        $card = Card::find($request->id_card);
        $card->content = $request->input('content_card');
        $card->statut_id = $request->input('statut_modif_card');
        $card->save();

        return redirect()->route('trellos.show', $project);
    }


    public function destroy($id, $project)
    {
        $card = Card::find($id);
        $card->delete();
        return redirect()->route('trellos.show', $project);
    }

    public function deleteList($statut_id, $project)
    {
        $statut = Statut::find($statut_id);
        $statut->delete();
        return redirect()->route('trellos.show', $project);
    }
}
