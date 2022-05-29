<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Apenas com login
Route::prefix('v1')->middleware('jwt.auth')->group(function (){
    Route::apiResource('categoria', \App\Http\Controllers\CategoriaController::class);
    Route::apiResource('chat', \App\Http\Controllers\ChatController::class);
    Route::apiResource('respostas', \App\Http\Controllers\RespostaController::class);
    Route::post('upvote/{id}', 'App\Http\Controllers\UpvoteController@action');
});
