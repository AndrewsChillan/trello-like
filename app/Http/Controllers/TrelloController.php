<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projets;

class TrelloController extends Controller
{
    public function index()
    {
        // récupération de toutes la table projets en passant par 
        // le Model / la classe "Projets" en connexion avec la BDD
        $projets = Projets::all();
        // dd($projets);

        return view('welcome', compact('projets'));
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
    }


    public function show($id)
    {
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
