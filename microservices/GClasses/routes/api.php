<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasseApiController;

Route::apiResource('classes', ClasseApiController::class);
