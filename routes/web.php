<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "<center>Pekan (Pengeluaran, Pemasukan)</center>";
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
	//spending
	Route::livewire('/spending', 'pekan.spending')
		->layout('layouts.app')->name('pekan.spending');
	//income
	Route::livewire('/income', 'pekan.income')
		->layout('layouts.app')->name('pekan.income');
});