<?php

namespace App\Http\Controllers;

use App\Models\classerooms;
use Illuminate\Http\Request;

class ClasseApiController extends Controller
{
    public function index()
    {
        $classes = classerooms::all();
        return response()->json($classes);
    }

    public function store(Request $request)
    {
        $classe = new classerooms();
        $classe->nomclasse = $request['nomclasse'];
        $classe->save();

        return response()->json(['success' => 'Une classe vient d\'etre Ajouter.'], 201);
    }

    public function show($id)
    {
        $classe = classerooms::find($id);
        return response()->json($classe);
    }

    public function update(Request $request, $id)
    {
        $classe = classerooms::find($id);
        $classe->nomclasse = $request['nomclasse'];
        $classe->save();

        return response()->json(['success' => 'Une classe vient d\'etre Modifier.']);
    }

    public function destroy($id)
    {
        $classe = classerooms::find($id);
        $classe->delete();

        return response()->json(['success' => 'Une classe vient d\'etre Supprimée.']);
    }
}
