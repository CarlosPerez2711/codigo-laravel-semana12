<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('contacto', 'contacto')->name('contacto');
Route::post('contacto', 'App\Http\Controllers\ContactoController@store');

Auth::routes(['register'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('servicios','App\Http\Controllers\Servicios2Controller')->names('servicios')->middleware('auth');





