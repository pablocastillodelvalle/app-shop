<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'TestController@welcome');

Route::get('/prueba', function (){



	return 'Esta es una ruta de prueba';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
