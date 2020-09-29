<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\User as UserResource;
use App\User;
use Auth;

class ProfileController extends Controller
{
	public function read(Request $request, User $user) 
	{
		return new UserResource(Auth::user());
	}

	public function update(Request $request, User $user) 
	{
		$this->validate($request, [
			'name'	=> 'required',
		]);

		$user = Auth::user();
		$user->name = $request->get('name', $user->name);
		$user->mobile_phone = $request->get('mobile_phone', $user->mobile_phone);
		if ($request->file('image') != '') {
			$image = $request->file('image');
			$filename =  date('YmdHis').str_replace(' ','',$request->file('image')->getClientOriginalName());

			$image_resize = Image::make($image->getRealPath());
			$image_resize->resize(200, 200);
			$image_resize->save(public_path('images/' .$filename));
			
			$user->avatar = $request->get('image', $filename);
		}
		$user->save();

		return new UserResource($user);
	}
}
