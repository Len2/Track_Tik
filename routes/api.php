<?php

use App\Http\Controllers\Providers\Provider1EmployeeController;
use App\Http\Controllers\Providers\Provider2EmployeeController;
use App\Http\Controllers\TrackTikAuth\OAuth2Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::post('trackTik/auth',[OAuth2Controller::class,'authRefreshToken']);


Route::get('provider1/employees', [Provider1EmployeeController::class, 'index']);
Route::post('provider1/employees', [Provider1EmployeeController::class, 'store']);
Route::get('provider1/employees/{employee}', [Provider1EmployeeController::class, 'show']);
Route::put('provider1/employees/{employee}', [Provider1EmployeeController::class, 'update']);
Route::delete('provider1/employees/{employee}', [Provider1EmployeeController::class, 'destroy']);

Route::get('provider2/employees', [Provider2EmployeeController::class, 'index']);
Route::post('provider2/employees', [Provider2EmployeeController::class, 'store']);
Route::get('provider2/employees/{employee}', [Provider2EmployeeController::class, 'show']);
Route::put('provider2/employees/{employee}', [Provider2EmployeeController::class, 'update']);
Route::delete('provider2/employees/{employee}', [Provider2EmployeeController::class, 'destroy']);
