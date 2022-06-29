<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Cards;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cards = Cards::all();
        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request)
    {
        $card = [
            'content' => $request->input('content'),
        ];

        Cards::create($card);

        return redirect()->route('cards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = Cards::with('list_id')->find($id);

        return view('cards.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CardRequest $card)
    {
        return view('cards.edit', compact('card'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, $id)
    {
        $card = Cards::find($id);
        $card->statut = $request->input('content');
        $card->save();

        return redirect()->route('cards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Cards::find($id);
        $card->delete();

        return redirect()->route('cards.index');
    }
}
