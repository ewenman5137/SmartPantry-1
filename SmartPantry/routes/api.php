<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\ProduitsController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories', CategoriesController::class);
Route::get('categories/{categorie}/produits', [CategoriesController::class, 'GetCategorieProduits']);
Route::apiResource('produits', ProduitsController::class);
