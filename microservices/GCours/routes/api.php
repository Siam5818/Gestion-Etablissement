<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursApiController;

Route::apiResource('cours', CoursApiController::class);
