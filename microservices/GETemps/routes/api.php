<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmploisTempsApiController;

Route::apiResource('emplois', EmploisTempsApiController::class);
