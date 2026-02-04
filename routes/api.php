<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\PersonController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// CRUD de Animales y Personas
// https://antoniojenaro.com/blog/optimizacion-de-tus-rutas-api-en-laravel-el-metodo-apiresource
// Link de donde he sacado la optimización de las rutas API
Route::apiResources([
    'animals' => AnimalsController::class,
    'person' => PersonController::class,
]);



