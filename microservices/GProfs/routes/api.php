<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfsApiController;

Route::apiResource('profs', ProfsApiController::class);
