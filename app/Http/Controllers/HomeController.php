<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Models\Param;
use App\Models\Kategori;
use App\Http\Controller;

class HomeController extends BaseController
{
	public function index(Request $request){
		// $param 					= Param::where('name', 'KATEGORI')->first();
		// $data['list_article'] 	= Kategori::orderBy('id','asc')->get();
		$data['title'] 			= 'tes';
		$data['description']	= 'tes';
		$data['name']			= strtoupper(Auth::user()->name);
		$data['role']			= strtoupper(Auth::user()->role);

	    return view('home',$data);
	}
}