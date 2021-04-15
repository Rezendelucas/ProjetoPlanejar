<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\workTimeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('vue-teste');
});

Auth::routes();

Route::get('/calculate_hours', ['as'=>'Calculo de horas trabalhadas' , 'uses'=>'App\Http\Controllers\WorkTimeController@newCalc']);


