<?php

use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\TokensController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => [], 'prefix' => 'v1'], function () {

    Route::post('/auth/login', [TokensController::class, 'login']);

    Route::resource('presentations', PresentationController::class)->names('admin.presentations');

});


Route::group(['middleware' => ['jwt.auth'], 'prefix' => 'v1'], function () {
    
    Route::post('/auth/refresh', [TokensController::class, 'refreshToken']);
    Route::post('/auth/expire', [TokensController::class, 'expireToken']);

});


