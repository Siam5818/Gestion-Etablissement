<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantApiController;

Route::apiResource('etudiants', EtudiantApiController::class);
