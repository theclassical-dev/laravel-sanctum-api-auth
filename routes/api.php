<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/details',[App\Http\Controllers\DetailsController::class, 'getAllDetails']);
Route::post('/details',[App\Http\Controllers\DetailsController::class, 'createDetail']);
Route::get('/details/{id}',[App\Http\Controllers\DetailsController::class, 'getDetail']);
Route::get('/details/search/{name}',[App\Http\Controllers\DetailsController::class, 'searchDetail']);
Route::get('/details/update/{id}',[App\Http\Controllers\DetailsController::class, 'updateDetail']);
Route::delete('/details/delete/{id}',[App\Http\Controllers\DetailsController::class, 'deleteDetail']);
