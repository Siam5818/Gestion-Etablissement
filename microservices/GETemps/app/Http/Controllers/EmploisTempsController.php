<?php

namespace App\Http\Controllers;

use App\Models\EmploisTemps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmploisTempsController extends Controller
{

    public function getClasses()
    {
        try {
            $response = Http::get('http://127.0.0.1:8002/api/classes');
            if ($response->successful()) {
                return $response->json();
            } else {
                throw new \Exception('Erreur lors de la récupération des classes');
            }
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getProfs()
    {
        try {
            $response = Http::get('http://127.0.0.1:8006/api/profs');
            if ($response->successful()) {
                return $response->json();
            } else {
                throw new \Exception('Erreur lors de la récupération des professeurs');
            }
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emplois = EmploisTemps::all();
        $classes = $this->getClasses();
        $profs = $this->getProfs();
        return view('listetemps', compact('emplois', 'classes', 'profs'));
    }


    /**
     * Store a newly created resource in storage.
     */
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
        return redirect()->route('Liste.Emploi')->with('success', 'Un Emplois du temps vient d\'etre Planifier.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $emploiup = EmploisTemps::find($id);
        $emplois = EmploisTemps::all();
        $classes = $this->getClasses();
        $profs = $this->getProfs();
        return view('listetemps', compact('emplois', 'emploiup', 'classes', 'profs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request['id'];

        $emploi = EmploisTemps::find($id);

        $emploi->jour = $request['jour'];
        $emploi->heure_debut = $request['heure_debut'];
        $emploi->heure_fin = $request['heure_fin'];
        $emploi->professeur = $request['professeur'];
        $emploi->matiere = $request['matiere'];
        $emploi->classe = $request['classe'];

        $emploi->save();
        return redirect()->route('Liste.Emploi')->with('success', 'Un Emplois du temps vient d\'etre Modifier.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emploi = EmploisTemps::find($id);
        $emploi->delete();
        return redirect()->route('Liste.Emploi')->with('success', 'Un Emploi du temps vient d\'etre Supprimer.');
    }
}
