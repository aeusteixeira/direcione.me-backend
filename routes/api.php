<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResources([
    'buildings' => \App\Http\Controllers\BuildingController::class,
    'locations' => \App\Http\Controllers\LocationController::class,
    'floors' => \App\Http\Controllers\FloorController::class,
    'services' => \App\Http\Controllers\ServiceController::class,
]);
