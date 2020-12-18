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

    Route::get('/appointments', 'AppointmentController@index')->name('appointments');
    Route::get('/appointments/filter', 'AppointmentController@filter')->name('appointments.filter');
    Route::post('/appointments', 'AppointmentController@store')->name('appointments.store');
    Route::patch('/appointments/{appointment}/edit', 'AppointmentController@update')->name('appointments.update');
    Route::delete('/appointments/{appointment}', 'AppointmentController@destroy')->name('appointments.destroy');

    Route::get('/doctors', 'DoctorController@doctors')->name('doctors');

    Route::post('/patients', 'PatientController@store')->name('patients.store');
});

 Route::get('/', 'HomeController@welcome')->name('welcome');