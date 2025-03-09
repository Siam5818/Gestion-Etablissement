<?php

namespace App\Http\Controllers;

use App\Models\profs;
use Illuminate\Http\Request;

class ProfsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profs = profs::all();
        return view('listprofs', compact('profs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prof = new profs();
        $prof->nomcomplet = $request['nomcomplet'];
        $prof->email = $request['email'];
        $prof->specialite = $request['specialite'];
        $prof->save();
        return redirect()->route('Liste.Prof')->with('success', 'Un professeur a été ajouté.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profup = profs::find($id);
        $profs = profs::all();
        return view('listprofs', compact('profup', 'profs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request['id'];
        $prof = profs::find($id);
        $prof->nomcomplet = $request['nomcomplet'];
        $prof->email = $request['email'];
        $prof->specialite = $request['specialite'];
        $prof->save();
        return redirect()->route('Liste.Prof')->with('success', 'Un professeur a été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prof = profs::find($id);
        $prof->delete();
        return redirect()->route('Liste.Prof')->with('success', 'Un professeur a été supprimé.');
    }
}
