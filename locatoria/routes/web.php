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

Route::get('/home', 'HomeController@home');





Auth::routes();

Route::get('/user/{user}', 'UserController@index')->name('user.show');

Route::get('/logout' , function() {
    Auth::logout();
    return redirect('/home');
});


Route::resource('items','ItemsController');


