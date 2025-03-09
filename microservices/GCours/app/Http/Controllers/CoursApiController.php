<?php

namespace App\Http\Controllers;

use App\Models\cours;
use Illuminate\Http\Request;

class CoursApiController extends Controller
{
    public function index()
    {
        $cours = cours::all();
        return response()->json($cours);
    }

    public function store(Request $request)
    {
        $cours = new cours();
        $cours->nom = $request['nom'];
        $cours->description = $request['description'];
        $cours->save();

        return response()->json(['success' => 'Un cours vient d\'etre Ajouter.'], 201);
    }

    public function show($id)
    {
        $cours = cours::find($id);
        return response()->json($cours);
    }

    public function update(Request $request, $id)
    {
        $cours = cours::find($id);
        $cours->nom = $request['nom'];
        $cours->description = $request['description'];
        $cours->save();

        return response()->json(['success' => 'Un cours vient d\'etre Modifier.']);
    }

    public function destroy($id)
    {
        $cours = cours::find($id);
        $cours->delete();

        return response()->json(['success' => 'Un cours vient d\'etre Supprimé.']);
    }
}
