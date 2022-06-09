<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Models\Param;
use App\Models\Kategori;
use App\Http\Controller;
use App\Models\MobilModel as tbl_mobil;
use App\Models\SewaModel as tbl_sewa;
use App\Models\RiwayatModel as tbl_riwayat;
use App\Models\VendorModel as tbl_vendor;

class HomeController extends BaseController
{
	public function index(Request $request){
		// $param 					= Param::where('name', 'KATEGORI')->first();
		// $data['list_article'] 	= Kategori::orderBy('id','asc')->get();
		$data['title'] 			= 'tes';
		$data['description']	= 'tes';
		// $data['name']			= strtoupper(Auth::user()->name);
		// $data['role']			= strtoupper(Auth::user()->role);
		$data['name']			= 'tes';
		$data['role']			= 'tes';
	    return view('homelanding',$data);
	}

	// tbl_mobil
	public function insertMobil(Request $request){
		$mobil = new tbl_mobil;
		// $request->validate([
		// 	'nama' => 'required',
		// 	'img' => 'required',
		// 	'kilometer' => 'required|number',
		// ]);
		$mobil->nama = $request->nama;
		$mobil->img = $request->img;
		$mobil->kilometer = $request->kilometer;
		$mobil->save();
		// return view('/', ['tbl_mobil' => $mobil, 'title' => 'Data Mobil' ]);
		return $this->getAllMobil();
	}

	public function getAllMobil(){
		foreach(tbl_mobil::all() as $all){
			echo $all->id. '|' .$all->nama. '|' .$all->img. '|' .$all->komentar.'</br>';
		}
		// return view('home', ['tbl_mobil' => tbl_mobil::all(), 'title' => 'Data Mobil']);
	}

	public function getForUpdateMobil(Request $request){
		$mobil = tbl_mobil::where('id', $request->id)->first();
		return view('/', ['tbl_mobil' => $mobil, 'title' => 'Update Data Mobil' ]);
	}

	public function updateMobil(Request $request){
		$mobil = tbl_mobil::where('id', $request->id)->first();
		$request->validate([
			'nama' => 'required',
			'img' => 'required',
			'kilometer' => 'required'
		]);
		$mobil->nama = $request->nama;
		$mobil->img = $request->img;
		$mobil->kilometer = $request->kilometer;
		$mobil->save();
		return view('/', ['tbl_mobil' => $mobil, 'title' => 'Data Mobil' ]);
	}
	
	public function deleteMobil(Request $request){
		$mobil = tbl_mobil::where('id', $request->id)->first();
		$mobil->delete();
		return view('/', ['tbl_mobil' => $mobil, 'title' => 'Data Mobil' ]);
	}
	

	// tbl_sewa
	public function insertSewa(Request $request){
		$sewa = new tbl_sewa;
		$request->validate([
			'id_mobil' => 'required',
			'id_user' => 'required',
			'tgl_mulai' => 'required',
			'tgl_akhir' => 'required',
			'create_by' => 'required'
		]);
		$sewa->id_mobil = $request->id_mobil;
		$sewa->id_user = $request->id_user;
		$sewa->tgl_mulai = $request->tgl_mulai;
		$sewa->tgl_akhir = $request->tgl_akhir;
		$sewa->create_by = $request->create_by;
		$sewa->save();
		return view('/', ['tbl_sewa' => $sewa, 'title' => 'Data Mobil' ]);
	}

	public function getAllSewa(){
		foreach(tbl_sewa::all() as $all){
			echo $all->id. '|' .$all->id_mobil. '|' .$all->id_user. '|' .$all->tgl_mulai. '|' .$all->tgl_akhir. '|' .$all->create_by.'</br>';
		}
		// return view('home', ['tbl_sewa' => tbl_sewa::all(), 'title' => 'Data Rental']);
	}

	public function getForUpdateSewa(Request $request){
		$sewa = tbl_sewa::where('id', $request->id)->first();
		return view('/', ['tbl_sewa' => $sewa, 'title' => 'Update Data Mobil' ]);
	}

	public function updateSewa(Request $request){
		$sewa = tbl_sewa::where('id', $request->id)->first();
		$request->validate([
			'id_mobil' => 'required',
			'id_user' => 'required',
			'tgl_mulai' => 'required',
			'tgl_akhir' => 'required',
			'create_by' => 'required'
		]);
		$sewa->id_mobil = $request->id_mobil;
		$sewa->id_user = $request->id_user;
		$sewa->tgl_mulai = $request->tgl_mulai;
		$sewa->tgl_akhir = $request->tgl_akhir;
		$sewa->create_by = $request->create_by;
		$sewa->save();
		return view('/', ['tbl_sewa' => $sewa, 'title' => 'Data Mobil' ]);
	}
	
	public function deleteSewa(Request $request){
		$sewa = tbl_sewa::where('id', $request->id)->first();
		$sewa->delete();
		return view('/', ['tbl_sewa' => $sewa, 'title' => 'Data Mobil' ]);
	}
	

	// tbl_riwayat
	public function insertRiwayat(Request $request){
		$riwayat = new tbl_riwayat;
		$request->validate([
			'id_mobil ' => 'required',
			'id_vendor' => 'required',
			'create_by' => 'required',
			'kilometer' => 'required'
		]);
		$riwayat->id_mobil  = $request->id_mobil;
		$riwayat->id_vendor = $request->id_vendor;
		$riwayat->create_by = $request->create_by;
		$riwayat->kilometer = $request->kilometer;
		$riwayat->save();
		return view('/', ['tbl_riwayat' => $riwayat, 'title' => 'Data Mobil' ]);
	}

	public function getAllRiwayat(){
		foreach(tbl_riwayat::all() as $all){
			echo $all->id. '|' .$all->id_mobil. '|' .$all->id_vendor. '|' .$all->create_by. '|' .$all->kilometer.'</br>';
		}
		// return view('home', ['tbl_riwayat' => tbl_riwayat::all(), 'title' => 'Riwayat Service']);
	}

	public function getForUpdateRiwayat(Request $request){
		$riwayat = tbl_riwayat::where('id', $request->id)->first();
		return view('/', ['tbl_riwayat' => $riwayat, 'title' => 'Update Data Mobil' ]);
	}

	public function updateRiwayat(Request $request){
		$riwayat = tbl_riwayat::where('id', $request->id)->first();
		$request->validate([
			'id_mobil ' => 'required',
			'id_vendor' => 'required',
			'create_by' => 'required',
			'kilometer' => 'required'
		]);
		$riwayat->id_mobil  = $request->id_mobil;
		$riwayat->id_vendor = $request->id_vendor;
		$riwayat->create_by = $request->create_by;
		$riwayat->kilometer = $request->kilometer;
		$riwayat->save();
		return view('/', ['tbl_riwayat' => $riwayat, 'title' => 'Data Mobil' ]);
	}
	
	public function deleteRiwayat(Request $request){
		$riwayat = tbl_riwayat::where('id', $request->id)->first();
		$riwayat->delete();
		return view('/', ['tbl_riwayat' => $riwayat, 'title' => 'Data Mobil' ]);
	}

	//tbl_vendor
	public function insertVendor(Request $request){
		$vendor = new tbl_vendor;
		$vendor->nama  = $request->nama;
		$vendor->save();
		return view('/', ['tbl_vendor' => $vendor, 'title' => 'Data Mobil' ]);
	}

	public function getAllVendor(){
		foreach(tbl_vendor::all() as $all){
			echo $all->id. '|' .$all->nama.'</br>';
		}
		// return view('home', ['tbl_vendor' => tbl_vendor::all(), 'title' => 'Data Vendor']);
	}

	public function getForUpdateVendor(Request $request){
		$vendor = tbl_vendor::where('id', $request->id)->first();
		return view('/', ['tbl_vendor' => $vendor, 'title' => 'Update Data Mobil' ]);
	}

	public function updateVendor(Request $request){
		$vendor = tbl_vendor::where('id', $request->id)->first();
		$request->validate([
			'nama ' => 'required',
		]);
		$vendor->nama  = $request->nama;
		$vendor->save();
		return view('/', ['tbl_vendor' => $vendor, 'title' => 'Data Mobil' ]);
	}
	
	public function deleteVendor(Request $request){
		$vendor = tbl_vendor::where('id', $request->id)->first();
		$vendor->delete();
		return view('/', ['tbl_vendor' => $vendor, 'title' => 'Data Mobil' ]);
	}
}