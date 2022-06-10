<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// use App\Models\Param;
use App\Models\Kategori;
use App\Http\Controller;
use App\Models\MobilModel as tbl_mobil;
use App\Models\SewaModel as tbl_sewa;
use App\Models\RiwayatModel as tbl_riwayat;
use App\Models\VendorModel as tbl_vendor;

class HomeController extends BaseController{
	
	public function mobil(Request $request){
		$data['status_login']	= Auth::check();
		
	    return view('mobil',$data);
	}
	
	public function index(Request $request){
		$data['status_login']	= Auth::check();
		if (Auth::check() == 0) {
			$data['role']			= 'guest';
		} else {
			$data['role']			= Auth::user()->role;			
		}

		$data['status_login']	= Auth::check();
		$data['list_product'] 	= tbl_mobil::orderBy('id','asc')->limit(4)->get();

	    return view('homelanding',$data);
	}

	// tbl_mobil
	public function insertMobil(Request $request){
		$mobil = new tbl_mobil;
		$request->validate([
			'nama_kendaraan' => 'required',
			'img' => 'required',
			'kilometer' => 'required|numeric',
		]);
		$mobil->nama = $request->nama_kendaraan;
		$file = $request->file('img');
        $fileName = $file->getClientOriginalName();
        $mobil->img = 'uploads/'.$fileName;
        $file->move(public_path('uploads'), $fileName);
		$mobil->kilometer = $request->kilometer;
		$mobil->save();
		return $this->getAllMobil();
	}

	public function getAllMobil(){
		$data['status_login']	= Auth::check();
		if (Auth::check() == 0) {
			$data['role']			= 'guest';
		} else {
			$data['role']			= Auth::user()->role;			
		}
		return view('contact', ['tbl_mobil' => tbl_mobil::all(), 'title' => 'DATA MOBIL GADERENTCAR'], $data);
	}

	public function getForUpdateMobil(Request $request){
		$data['status_login']	= Auth::check();
		if (Auth::check() == 0) {
			$data['role']			= 'guest';
		} else {
			$data['role']			= Auth::user()->role;			
		}
		$mobil = tbl_mobil::where('id', $request->id)->get();
		if($request->flag == "Service"){
			return view('service', ['tbl_mobil' => $mobil, 'tbl_vendor' => tbl_vendor::all(), 'title' => 'SERVICE MOBIL GADERENTCAR'], $data);
		} else {
			return view('contact', ['tbl_mobil' => $mobil, 'title' => 'UPDATE MOBIL GADERENTCAR'], $data);
		}
	}

	public function updateMobil(Request $request){
		$mobil = tbl_mobil::where('id', $request->id)->first();
		$request->validate([
			'nama_kendaraan' => 'required',
			'kilometer' => 'required|numeric',
		]);
		$mobil->nama = $request->nama_kendaraan;
		if($request->img != null){
			$file = $request->file('img');
			$fileName = $file->getClientOriginalName();
			$mobil->img = 'uploads/'.$fileName;
			$file->move(public_path('uploads'), $fileName);
		}
		$mobil->kilometer = $request->kilometer;
		$mobil->save();
		return $this->getAllMobil();
	}
	
	public function deleteMobil(Request $request){
		$mobil = tbl_mobil::where('id', $request->id)->first();
		$mobil->delete();
		return $this->getAllMobil();
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
		$data['status_login']	= Auth::check();
		if (Auth::check() == 0) {
			$data['role']			= 'guest';
		} else {
			$data['role']			= Auth::user()->role;			
		}
		foreach(tbl_sewa::all() as $all){
			echo $all->id. '|' .$all->id_mobil. '|' .$all->id_user. '|' .$all->tgl_mulai. '|' .$all->tgl_akhir. '|' .$all->create_by.'</br>';
		}
		// return view('home', ['tbl_sewa' => tbl_sewa::all(), 'title' => 'Data Rental']);
	}

	public function getForUpdateSewa(Request $request){
		$data['status_login']	= Auth::check();
		if (Auth::check() == 0) {
			$data['role']			= 'guest';
		} else {
			$data['role']			= Auth::user()->role;			
		}
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
			'id_mobil' => 'required',
			'id_vendor' => 'required',
			'create_by' => 'required',
			'kilometer' => 'required',
			'keluhan' => 'required'
		]);
		$riwayat->id_mobil  = $request->id_mobil;
		$riwayat->id_vendor = $request->id_vendor;
		$riwayat->create_by = $request->create_by;
		$riwayat->kilometer = $request->kilometer;
		$riwayat->keluhan_kendaraan = $request->keluhan;
		$riwayat->save();
		if($request->flag == "Service"){
			return $this->getAllMobil();
		}
		else {
			return $this->getAllRiwayat();
		}
	}

	public function getAllRiwayat(){
		$data['status_login']	= Auth::check();
		if (Auth::check() == 0) {
			$data['role']			= 'guest';
		} else {
			$data['role']			= Auth::user()->role;			
		}
		$tbl_riwayat = DB::table('tbl_riwayat')
			->join ('tbl_mobil', 'tbl_riwayat.id_mobil', '=', 'tbl_mobil.id')
			->join ('tbl_vendor', 'tbl_riwayat.id_vendor', '=', 'tbl_vendor.id')
			->select(
				'tbl_riwayat.id',
				'tbl_riwayat.id_mobil',
				'tbl_riwayat.id_vendor',
				'tbl_mobil.img',
				'tbl_mobil.nama as merk_mobil',
				'tbl_riwayat.kilometer',
				'tbl_vendor.nama as bengkel',
				'tbl_riwayat.create_by as pic',
				'tbl_riwayat.created_at',
			)
			->get()
			->union(
				DB::table('tbl_riwayat')
				->join ('tbl_vendor', 'tbl_riwayat.id_vendor', '=', 'tbl_vendor.id')
				->select(
					'tbl_riwayat.id',
					'tbl_riwayat.id_mobil',
					'tbl_riwayat.id_vendor',
					'tbl_riwayat.id_vendor as img',
					'tbl_riwayat.id_mobil as merk_mobil',
					'tbl_riwayat.kilometer',
					'tbl_vendor.nama as bengkel',
					'tbl_riwayat.create_by as pic',
					'tbl_riwayat.created_at',
				)->get()
			);
		return view('service', ['tbl_riwayat' => $tbl_riwayat, 'tbl_vendor' => tbl_vendor::all(), 'title' => 'DATA SERVICE MOBIL GADERENTCAR'], $data);
	}

	public function getForUpdateRiwayat(Request $request){
		$data['status_login']	= Auth::check();
		if (Auth::check() == 0) {
			$data['role']			= 'guest';
		} else {
			$data['role']			= Auth::user()->role;			
		}
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
		$request->validate([
			'nama' => 'required'
		]);
		$vendor->nama  = $request->nama;
		$vendor->save();
		return $this->getAllVendor();
	}

	public function getAllVendor(){
		$data['status_login']	= Auth::check();
		if (Auth::check() == 0) {
			$data['role']			= 'guest';
		} else {
			$data['role']			= Auth::user()->role;			
		}
		return view('service', ['tbl_vendor' => tbl_vendor::all(), 'title' => 'INSERT VENDOR'], $data);
	}

	public function getForUpdateVendor(Request $request){
		$data['status_login']	= Auth::check();
		if (Auth::check() == 0) {
			$data['role']			= 'guest';
		} else {
			$data['role']			= Auth::user()->role;			
		}
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