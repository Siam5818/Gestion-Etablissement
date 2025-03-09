<?php

namespace App\Http\Controllers;

use App\Models\classerooms;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = classerooms::all();
        return view('listclasse', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $classe = new classerooms();

        $classe->nomclasse = $request['nomclasse'];

        $classe->save();
        return redirect()->route('Liste.Classes')->with('success', 'Une classe vient d\'etre Ajouter.');
    }

    public function edit(string $id)
    {
        $classe = classerooms::find($id);
        $classes = classerooms::all();
        return view('listclasse', compact('classe', 'classes'));
    }


    public function update(Request $request)
    {
        $id = $request['id'];

        $classe = classerooms::find($id);

        $classe->nomclasse = $request['nomclasse'];

        $classe->save();
        return redirect()->route('Liste.Classes')->with('success', 'Une classe vient d\'etre Modifier.');
    }
}
