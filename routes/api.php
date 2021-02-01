<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DistribuitorController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\EmployeerController;
use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\UbicationController;
use App\Http\Controllers\TokensController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => [], 'prefix' => 'v1'], function () {

    Route::post('/auth/login', [TokensController::class, 'login']);

    // Validates
    Route::resource('presentations', PresentationController::class)->names('admin.presentations');
    Route::resource('ubications', UbicationController::class)->names('admin.ubications');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('distribuitors', DistribuitorController::class)->names('admin.distribuitors');
    Route::resource('districts', DistrictController::class)->names('admin.districts');

    Route::resource('products', ProductController::class)->names('admin.products');
    Route::resource('providers', ProviderController::class)->names('admin.providers');
    Route::resource('customers', CustomerController::class)->names('admin.customers');
    Route::resource('employeers', EmployeerController::class)->names('admin.employeers');







});


Route::group(['middleware' => ['jwt.auth'], 'prefix' => 'v1'], function () {

    
    
});


