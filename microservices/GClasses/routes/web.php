<?php

use App\Http\Controllers\ClasseController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('Liste.Classes');
});

Route::get('/listedesclasses', [ClasseController::class, 'index'])->name('Liste.Classes');
Route::post('/ajoutclasses', [ClasseController::class, 'store'])->name('Ajout.Classe');
Route::get('/editclasse/{id}', [ClasseController::class, 'edit'])->name('Edit.Classe');
Route::put('/updateclasse', [ClasseController::class, 'update'])->name('Update.Classe');
