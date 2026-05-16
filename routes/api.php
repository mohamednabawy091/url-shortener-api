<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function(){
    Route::post('/signup', [AuthController::class, 'signUp']);
    Route::post('/login', [AuthController::class, 'login']);

        Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});


