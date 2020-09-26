<?php

namespace App\Http\Livewire\Pekan;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{

	public function logout()
	{
		Auth::logout();
		return redirect()->route('auth.login');
	}

	public function render()
	{
		return view('livewire.pekan.logout');
	}
}
