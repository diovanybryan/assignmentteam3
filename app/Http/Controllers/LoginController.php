<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// use App\Models\Param;
use App\Models\Users;

class LoginController extends BaseController
{
	public function login(Request $request){
		if (Auth::check() == 1) {
			return redirect('/home');
		}
		// $param 					= Param::where('name', 'LOGIN')->first();
		$data['title'] 			= 'WELCOME PAGE';
		$data['description']	= 'PLEASE LOGIN TO YOUR ACCOUNT';

	    return view('newlogin',$data);
	}

	public function auth_process(Request $request){
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required'],
		]);

		if (Auth::attempt($credentials)) {
			$request->session()->regenerate();
			return redirect('/home');
		}

		return back()->withErrors([
			'email' => 'The provided credentials do not match our records',
		])->onlyInput('email');
	}

	public function logout(Request $request){
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/');
	}

	public function register(Request $request){
		// $param 					= Param::where('name', 'REGISTER')->first();
		$data['title'] 			= 'REGISTER PAGE';
		$data['description']	= 'SIGN UP FOR FREE';

	    return view('register',$data);
	}

	public function add_user(Request $request){
		$users = new Users;
		$users->name = $request->name;
		$users->email = $request->email;
		$users->password = bcrypt($request->password);
		$users->save();

		return redirect('/login')->withSuccess('Berhasil Register Akun');
	}
}