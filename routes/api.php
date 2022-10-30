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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Users routes:
Route::get('users/{id}/appointments', 'App\Http\Controllers\UsersController@index');
Route::get('users/{id}', 'App\Http\Controllers\UsersController@show');
Route::post('users','App\Http\Controllers\UsersController@store');

//Specialties routes:
Route::get('specialties', 'App\Http\Controllers\SpecialtiesController@index');
Route::get('specialties/{id}', 'App\Http\Controllers\SpecialtiesController@show');

//Apointments routes:
Route::get('appointments/{day}', 'App\Http\Controllers\AppointmentsController@show');
Route::post('appointments', 'App\Http\Controllers\AppointmentsController@store');

