<?php

namespace App\Http\Controllers;

use App\Models\etudiant;
use Illuminate\Http\Request;

class EtudiantApiController extends Controller
{
    public function index()
    {
        $etudiants = etudiant::all();
        return response()->json($etudiants);
    }

    public function store(Request $request)
    {
        $etudiant = new etudiant();
        $etudiant->nomcomplet = $request['nomcomplet'];
        $etudiant->email = $request['email'];
        $etudiant->save();

        return response()->json(['success' => 'Un étudiant a été ajouté.'], 201);
    }

    public function show($id)
    {
        $etudiant = etudiant::find($id);
        return response()->json($etudiant);
    }

    public function update(Request $request, $id)
    {
        $etudiant = etudiant::find($id);
        $etudiant->nomcomplet = $request['nomcomplet'];
        $etudiant->email = $request['email'];
        $etudiant->save();

        return response()->json(['success' => 'Un étudiant a été modifié.']);
    }

    public function destroy($id)
    {
        $etudiant = etudiant::find($id);
        $etudiant->delete();

        return response()->json(['success' => 'Un étudiant a été supprimé.']);
    }
}
