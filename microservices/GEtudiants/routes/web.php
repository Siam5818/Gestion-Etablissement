<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

Route::get('/', function () {
    return redirect()->route('Liste.Etudiant');
});

Route::get('/listetudiants', [EtudiantController::class, 'index'])->name('Liste.Etudiant');
Route::post('/ajoutetudiant', [EtudiantController::class, 'store'])->name('Ajout.Etudiant');
Route::get('/editetudiant/{id}', [EtudiantController::class, 'edit'])->name('Edit.Etudiant');
Route::put('/updateetudiant', [EtudiantController::class, 'update'])->name('Update.Etudiant');
Route::delete('/deleteetudiant/{id}', [EtudiantController::class, 'destroy'])->name('Delete.Etudiant');
