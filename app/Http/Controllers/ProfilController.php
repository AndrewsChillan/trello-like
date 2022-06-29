<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function edit($id)
    {
        
        $profile = User::find($id);

        return view('profiles.edit', compact('profile'));
    }

    
    public function update(Request $request, $id)
    {
        $profile = User::findOrFail($id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        
        $profile->save();
        return redirect()->route('trellos.index');
    }
}
