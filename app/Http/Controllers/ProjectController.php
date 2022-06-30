<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Project;
use App\Models\Card;

use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {

        $cards = Card::all();
        return view('projects.index', compact('cards'));
    }


    public function create()
    {
        return view('projects.create');
    }


    public function store(CardRequest $request)
    {
        $card = [
            'content' => $request->input('content'),
        ];

        Card::create($card);

        return redirect()->route('projects.index');
    }


    public function show($id)
    {
        $card = Card::with('statut_id')->find($id);

        return view('projects.show', compact('project'));
    }


    public function edit($id)
    {   
        $card = Card::find($id);
        return view('#', compact('id'));
    }


    public function update(CardRequest $request, $id)
    {
        $card = Card::find($id);
        $card->statut = $request->input('content');
        $card->save();

        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        $card = Card::find($id);
        $card->delete();

        return redirect()->route('projects.index');
    }
}
