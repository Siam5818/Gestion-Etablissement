<?php
use App\Http\Controllers\CoursController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('Liste.Cours');
});

Route::get('/listedescours', [CoursController::class, 'index'])->name('Liste.Cours');
Route::post('/ajoutcours', [CoursController::class, 'store'])->name('Ajout.Cours');
Route::get('/editcours/{id}', [CoursController::class, 'edit'])->name('Edit.Cours');
Route::put('/updatecours', [CoursController::class, 'update'])->name('Update.Cours');
Route::delete('/deletecours/{id}', [CoursController::class, 'destroy'])->name('Delete.Cours');
