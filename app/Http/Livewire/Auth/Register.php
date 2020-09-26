<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\User;

class Register extends Component
{
	public $name;
	public $email;
	public $password;
	public $password_confirmation;

	public function store()
	{
		$this->validate([
			'name'      => 'required',
			'email'     => 'required|email|unique:users',
			'password'  => 'required|confirmed|min:8'
		]);

		$user = User::create([
			'name'      => $this->name,
			'email'     => $this->email,
			'api_token'	=> Str::random(60),
			'password'	=> Hash::make($this->password),
		]);

		if($user) {
			session()->flash('success', 'Register Berhasil!.');
			return redirect()->route('auth.login');
		}
	}

	public function render()
	{
		return view('livewire.auth.register');
	}
}
