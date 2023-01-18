<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TrainerController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['role:admin','jwtauth:api']], function () {

    //RUTAS DE SPORT
    
    Route::get('/sport',[SportController::class,'index']);
    Route::get('/sport/{id}',[SportController::class,'show']);
    Route::post('/sport',[SportController::class,'store']);
    Route::put('/sport/{id}',[SportController::class,'update']);
    Route::delete('/sport/{id}',[SportController::class,'destroy']);
    


    //RUTAS DE POSITION
    Route::get('/position',[PositionController::class,'index']);
    Route::get('/position/{id}',[PositionController::class,'show']);
    Route::post('/position',[PositionController::class,'store']);
    Route::put('/position/{id}',[PositionController::class,'update']);
    Route::delete('/position/{id}',[PositionController::class,'destroy']);


    //RUTAS DE TRAINER
    Route::group(['middleware' => ['role:trainer|admin']], function () {
        Route::get('/trainer',[TrainerController::class,'index']);
        Route::get('/trainer/{id}',[TrainerController::class,'show']);
        Route::post('/trainer',[TrainerController::class,'store']);
        Route::put('/trainer/{id}',[TrainerController::class,'update']);
        Route::delete('/trainer/{id}',[TrainerController::class,'destroy']);
    });

    //RUTAS DE TEAM
    Route::group(['middleware' => ['role:trainer|admin']], function () {
        Route::get('/team',[TeamController::class,'index']);
        Route::get('/team/{id}',[TeamController::class,'show']);
        Route::post('/team',[TeamController::class,'store']);
        Route::put('/team/{id}',[TeamController::class,'update']);
        Route::delete('/team/{id}',[TeamController::class,'destroy']);
    });


    //RUTAS DE PLAYER
    Route::group(['middleware' => ['role:trainer|admin']], function () {
        Route::get('/player',[PlayerController::class,'index']);
        Route::get('/player/{id}',[PlayerController::class,'show']);
        Route::post('/player',[PlayerController::class,'store']);
        Route::put('/player/{id}',[PlayerController::class,'update']);
        Route::delete('/player/{id}',[PlayerController::class,'destroy']);
    });



});

Route::group([
    'prefix' => 'auth',
    'controller' => AuthController::class
], function ($router) {

    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::middleware('jwtauth:api')->group(function(){
        Route::get('refresh', 'refresh');
        Route::get('me', 'me');
    });

});
