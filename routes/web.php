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
require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::get('/appointments', 'AppointmentController@index');
    Route::get('/appointments/filter', 'AppointmentController@filter');
    Route::post('/appointments/new', 'AppointmentController@store');
    Route::patch('/appointments/{appointment}/edit', 'AppointmentController@update');
    Route::delete('/appointments/{appointment}', 'AppointmentController@destroy');
});

 Route::get('/', 'HomeController@welcome')->name('welcome');