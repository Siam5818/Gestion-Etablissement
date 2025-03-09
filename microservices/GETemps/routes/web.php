<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmploisTempsController;

Route::get('/', function () {
    return redirect()->route('Liste.Emploi');
});

Route::get('/listetemp', [EmploisTempsController::class, 'index'])->name('Liste.Emploi');
Route::post('/emplois', [EmploisTempsController::class, 'store'])->name('Ajout.Emploi');
Route::get('/editemploi/{id}', [EmploisTempsController::class, 'edit'])->name('Edit.Emploi');
Route::put('/updateemploi', [EmploisTempsController::class, 'update'])->name('Update.Emploi');
Route::delete('/deleteemploi/{id}', [EmploisTempsController::class, 'destroy'])->name('Delete.Emploi');

