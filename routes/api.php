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

// 

//Users routes:

Route::get('users/{id}', 'App\Http\Controllers\UsersController@show');


//Specialties routes:
Route::get('specialties', 'App\Http\Controllers\SpecialtiesController@index');
Route::get('specialties/{id}', 'App\Http\Controllers\SpecialtiesController@show');

//Appointments routes:

Route::get('appointments/show', 'App\Http\Controllers\AppointmentsController@show');

Route::get('appointments/patients/{user_id}', 'App\Http\Controllers\AppointmentsController@index');


Route::post('appointments', 'App\Http\Controllers\AppointmentsController@store');
