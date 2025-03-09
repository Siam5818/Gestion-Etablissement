<?php

namespace App\Http\Controllers;

use App\Models\profs;
use Illuminate\Http\Request;

class ProfsApiController extends Controller
{
    public function index()
    {
        $profs = profs::all();
        return response()->json($profs);
    }

    public function store(Request $request)
    {
        $prof = new profs();
        $prof->nomcomplet = $request['nomcomplet'];
        $prof->email = $request['email'];
        $prof->specialite = $request['specialite'];
        $prof->save();

        return response()->json(['success' => 'Un professeur vient d\'etre ajouté.'], 201);
    }

    public function show($id)
    {
        $prof = profs::find($id);
        return response()->json($prof);
    }

    public function update(Request $request, $id)
    {
        $prof = profs::find($id);
        $prof->nomcomplet = $request['nomcomplet'];
        $prof->email = $request['email'];
        $prof->specialite = $request['specialite'];
        $prof->save();

        return response()->json(['success' => 'Un professeur vient d\'etre modifié.']);
    }

    public function destroy($id)
    {
        $prof = profs::find($id);
        $prof->delete();

        return response()->json(['success' => 'Un professeur vient d\'etre supprimé.']);
    }
}
