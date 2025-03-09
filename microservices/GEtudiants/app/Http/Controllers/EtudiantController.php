<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = etudiant::all();
        return view('listetudiant', compact('etudiants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $etudiant = new etudiant();
        $etudiant->nomcomplet = $request['nomcomplet'];
        $etudiant->email = $request['email'];
        $etudiant->save();
        return redirect()->route('Liste.Etudiant')->with('success', 'Un étudiant a été ajouté.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $etudiantup = etudiant::find($id);
        $etudiants = etudiant::all();
        return view('listetudiant', compact('etudiantup', 'etudiants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request['id'];
        $etudiant = etudiant::find($id);
        $etudiant->nomcomplet = $request['nomcomplet'];
        $etudiant->email = $request['email'];
        $etudiant->save();
        return redirect()->route('Liste.Etudiant')->with('success', 'Un étudiant a été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $etudiant = etudiant::find($id);
        $etudiant->delete();
        return redirect()->route('Liste.Etudiant')->with('success', 'Un étudiant a été supprimé.');
    }
}
