<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//auth user
Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => 'auth:api'], function(){
	//profile
	Route::get('profile', 'ProfileController@read');
	Route::post('profile', 'ProfileController@update');
	//pekan
	Route::post('pekan', 'PekanController@create');
	Route::get('pekan', 'PekanController@read');
	Route::put('pekan/{pekan}', 'PekanController@update');
	Route::delete('pekan/{pekan}', 'PekanController@delete');
	//analysis
	Route::get('analysis', 'PekanController@analysis');
});