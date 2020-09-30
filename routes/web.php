<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function(){
	//register
	Route::livewire('/register', 'auth.register')
	->layout('layouts.app')->name('auth.register');
	//login
	Route::livewire('/login', 'auth.login')
	->layout('layouts.app')->name('auth.login');
});

Route::group(['middleware' => 'auth'], function(){
	//dashboard
	Route::livewire('/pekan', 'pekan.dashboard')
	->layout('layouts.app')->name('pekan.dashboard');
});