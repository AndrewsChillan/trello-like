<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Project;
use App\Models\Card;

use Illuminate\Http\Request;

class ProjectController extends Controller
{


    public function store(Request $request, $statut)
    {   
    {
        // Validation de formulaire avant envoie dans la BDD
        // $request->validate([
        //     'new_card' => 'required|string',
        //     'statut_ajout_card' => 'required|integer'
        // ]);

        $card = [
            'content' => $request->input('new_card'),
            'statut_id' => $request->input('statut_ajout_card')
        ];

       $cardA= Card::create($card);
        $cardA->id;
        return redirect()->route('trellos.show', $statut);
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
}
