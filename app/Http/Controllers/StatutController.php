<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Statut;
use App\Models\Card;

class StatutController extends Controller
{
    public function indew()
    {
        $statuts = Statut::all();
        return view('welcome', compact('projects'));
    }

    public function create()
    {
        return view('trellos.create');
    }

    public function store(Request $request)
    {
        
         $request->validate([
            'statut' => 'required|string',

        ]);

        
        $statut = [
            "statut" => $request->statut,
            'user_id' => Auth::user()->id,
        ];

        
        Statut::create($statut);

        return redirect()->route('trellos.index');
    }

    public function show($id)
    {
        $statut = Statut::with('statuts.cards')->find($id);
        $statuts = $statut->statuts;
        return view('trellos.show', compact('statuts'));
    }
}
