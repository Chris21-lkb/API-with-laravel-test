<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\NameController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('data')->group(function(){
    Route::get('find/{name}',[DeviceController::class,'find']);
    Route::post('save',[DeviceController::class,'index']);

    Route::put('update',[DeviceController::class,'update']);

    Route::delete('delete/{id}',[DeviceController::class,'delete']);
    Route::get('read',[DeviceController::class,'read']);
    Route::put('updatedb2',[DeviceController::class,'updatedb2']);
    Route::delete('deletedb2/{id}',[DeviceController::class,'deletedb2']);
});
