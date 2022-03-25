<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/orderform', 'App\Http\Controllers\OrderFormController@index');
Route::post('/orderform/delivalydate', 'App\Http\Controllers\OrderFormController@delivalyDaysCreate')->name('orderform.delivalyDaysCreate');