<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\SpectacleController;
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

Route::middleware('api')->group(function () {
    Route::resource('pieces', PieceController::class);
    });

    Route::middleware('api')->group(function () {
        Route::resource('salles', SalleController::class);
        });


        Route::middleware('api')->group(function () {
            Route::resource('spectacles', SpectacleController::class); 
            });
            Route::get('/spec/{idsal}', 
            [SpectacleController::class,'showSpectacleBySAL']);
            
                
    

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
