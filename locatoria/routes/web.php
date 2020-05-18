<?php

use Illuminate\Support\Facades\Auth;
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




Route::get('/', 'ItemController@showHome');
Route::get('/home', 'ItemController@showHome');

Auth::routes();

Route::resource('Item','ItemController');
Route::resource('ItemPhoto','ItemPhotoController');

Route::get('/items/myitems/{user}', 'ItemController@index');

Route::put('/Item/{id}/delete','ItemController@destroy')->name('Item.delete');



Route::get('/users', 'UserController@index');
Route::get('/user/delete/{user}', 'UserController@delete');


Route::resource('user', 'UserController');



Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::get('/admin', 'AdminController@show');


Route::resource('Category','CategoryController');

Route::resource('Reservation','ReservationController');
Route::get('/MyReservations','ReservationController@reservation');
Route::get('/MyRequests','ReservationController@request');
Route::put('/MyRequests/{id}/approve','ReservationController@approval')->name('MyRequests.approve');
Route::put('/MyRequests/{id}/refuse','ReservationController@destroy')->name('MyRequests.refuse');






Route::post('/reser', 'ReservationController@store');
Route::get('/reservations', 'ReservationController@index');


// admin delete
Route::post('/userblockunblock', 'UserController@block');
//Route::get('/useroperation/{user}', 'UserController@usersajaxfetch');  // for testing
Route::post('/useroperation', 'UserController@usersajaxfetch');

