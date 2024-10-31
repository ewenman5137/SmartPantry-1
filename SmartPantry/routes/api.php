<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\ProduitsController;
use App\Http\Controllers\AuthController;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route group for Sanctum authentication
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
});

// Route Login Register 
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

//

Route::apiResource('categories', CategoriesController::class);
Route::get('categories/{categorie}/produits', [CategoriesController::class, 'GetCategorieProduits']);
Route::apiResource('produits', ProduitsController::class);
