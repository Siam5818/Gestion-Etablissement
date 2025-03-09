<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfsController;

Route::get('/', function () {
    return redirect()->route('Liste.Prof');
});

Route::get('/listprofs', [ProfsController::class, 'index'])->name('Liste.Prof');
Route::post('/ajoutprof', [ProfsController::class, 'store'])->name('Ajout.Prof');
Route::get('/editprof/{id}', [ProfsController::class, 'edit'])->name('Edit.Prof');
Route::put('/updateprof', [ProfsController::class, 'update'])->name('Update.Prof');
Route::delete('/deleteprof/{id}', [ProfsController::class, 'destroy'])->name('Delete.Prof');
