<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\UploadController;
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

Route::post('/register',[App\Http\Controllers\Authcontroller::class, 'register']);
Route::post('/login',[App\Http\Controllers\Authcontroller::class, 'login']);

Route::get('/details',[App\Http\Controllers\DetailsController::class, 'getAllDetails']);
Route::get('/details/{id}',[App\Http\Controllers\DetailsController::class, 'getDetail']);
Route::get('/details/search/{name}',[App\Http\Controllers\DetailsController::class, 'searchDetail']);
Route::post('/upload', [App\Http\Controllers\UploadController::class, 'upload']);
Route::get('/getAllImage', [App\Http\Controllers\UploadController::class, 'getImages']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/details',[App\Http\Controllers\DetailsController::class, 'createDetail']);
    Route::put('/details/update/{id}',[App\Http\Controllers\DetailsController::class, 'updateDetail']);
    Route::delete('/details/delete/{id}',[App\Http\Controllers\DetailsController::class, 'deleteDetail']);
    Route::delete('/details/deleteall',[App\Http\Controllers\DetailsController::class, 'deleteAll']);
    Route::post('/logout',[App\Http\Controllers\Authcontroller::class, 'logout']);

    
});