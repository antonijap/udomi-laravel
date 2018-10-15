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

Route::get('send_test_email', function(){
	Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
	{
		$message->to('antonijapek@gmail.com');
	});
});

Route::get('/reset-password/{token?}', 'PasswordController@showForm');
Route::post('/reset-password', 'PasswordController@resetPassword');

Route::get('/', 'AdsController@index')->name('home');
Route::get('/ads/new', 'AdsController@new');
Route::post('/ads/new', 'AdsController@create');
Route::post('/results', 'AdsController@filter');
Route::get('/{username}/{ad}', 'AdsController@show');

Route::get('/register', 'RegistrationController@show');
Route::post('/register', 'RegistrationController@create');

Route::get('/login', 'SessionsController@show')->name('login');
Route::post('/login', 'SessionsController@login');
Route::get('/logout', 'SessionsController@logout');

Route::get('/dashboard', 'UserController@show')->name('dashboard');

Route::get('/settings', 'UserController@showSettings');
Route::post('/settings', 'UserController@update');
Route::get('/{username}', 'UserController@profile');

Route::get('/ad/{ad}/edit', 'DashboardController@show');
Route::post('/ad/{ad}/edit', 'DashboardController@update');
Route::get('/ad/{ad}/adopted', 'DashboardController@markAdopted');
Route::get('/ad/{ad}/restore', 'DashboardController@restore');
Route::get('/ad/{ad}/delete', 'DashboardController@delete');
Route::get('/ad/{ad}/boost', 'DashboardController@boost');
