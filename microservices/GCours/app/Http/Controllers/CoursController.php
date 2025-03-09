<?php

namespace App\Http\Controllers;

use App\Models\cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours = cours::all();
        return view('listcours', compact('cours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cours = new cours();

        $cours->nom = $request['nom'];
        $cours->description = $request['description'];

        $cours->save();
        return redirect()->route('Liste.Cours')->with('success', 'Une cours vient d\'etre Ajouter.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $courup = cours::find($id);
        $cours = cours::all();
        return view('listcours', compact('courup', 'cours'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request['id'];

        $cours = cours::find($id);

        $cours->nom = $request['nom'];
        $cours->description = $request['description'];

        $cours->save();
        return redirect()->route('Liste.Cours')->with('success', 'Une cours vient d\'etre Modifier.');
    }

    /**
     * Destroy the specified resource in storage.
     */
    public function destroy($id)
    {
        $cours = cours::find($id);
        $cours->delete();
        return redirect()->route('Liste.Cours')->with('success', 'Un cours a été supprimé.');
    }
}
