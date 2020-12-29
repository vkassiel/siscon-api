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
Route::get('/', function(){
    return ["Welcome to my api!"];
});

// Employees
Route::get('/employees', 'EmployeesController@index');
Route::get('/employees/{id}', 'EmployeesController@show');
Route::post('/employees', 'EmployeesController@store');
Route::put('/employees', 'EmployeesController@update');
Route::delete('/employees/{id}', 'EmployeesController@destroy');