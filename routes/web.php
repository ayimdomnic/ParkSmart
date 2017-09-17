<?php

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
    return view('welcome');
});

Auth::routes();
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/parking/add', 'HomeController@add_parking')->name('parking.add');
Route::post('/parking/add', 'HomeController@store_parking')->name('parking.store');
Route::get('user/profile', 'HomeController@profile')->name('user.profile');
Route::post('user/profile/update', 'HomeController@profile_store')->name('profile.update');
