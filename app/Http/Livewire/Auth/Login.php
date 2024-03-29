<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
	public $email;
	public $password;

	public function login()
	{
		$this->validate([
			'email'     => 'required|email',
			'password'  => 'required'
		]);

		if(Auth::attempt(['email' => $this->email, 'password'=> $this->password])) {
			return redirect()->route('pekan.dashboard');
		} else {
			session()->flash('error', 'Alamat Email atau Password Anda salah!.');
			return redirect()->route('auth.login');
		}
	}

	public function render()
	{
		return view('livewire.auth.login');
	}
}
