<?php

namespace App\Http\Controllers;

use App\Models\EmploisTemps;
use Illuminate\Http\Request;

class EmploisTempsApiController extends Controller
{
    public function index()
    {
        $emplois = EmploisTemps::all();
        return response()->json($emplois);
    }

    public function store(Request $request)
    {
        $emploi = new EmploisTemps();
        $emploi->jour = $request['jour'];
        $emploi->heure_debut = $request['heure_debut'];
        $emploi->heure_fin = $request['heure_fin'];
        $emploi->professeur = $request['professeur'];
        $emploi->matiere = $request['matiere'];
        $emploi->classe = $request['classe'];
        $emploi->save();

        return response()->json(['success' => 'Un emploi du temps a été planifié.'], 201);
    }

    public function show($id)
    {
        $emploi = EmploisTemps::find($id);
        return response()->json($emploi);
    }

    public function update(Request $request, $id)
    {
        $emploi = EmploisTemps::find($id);
        $emploi->jour = $request['jour'];
        $emploi->heure_debut = $request['heure_debut'];
        $emploi->heure_fin = $request['heure_fin'];
        $emploi->professeur = $request['professeur'];
        $emploi->matiere = $request['matiere'];
        $emploi->classe = $request['classe'];
        $emploi->save();

        return response()->json(['success' => 'Un emploi du temps a été modifié.']);
    }

    public function destroy($id)
    {
        $emploi = EmploisTemps::find($id);
        $emploi->delete();

        return response()->json(['success' => 'Un emploi du temps a été supprimé.']);
    }
}
