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

class OrderController extends BaseController
{
	public function index(Request $request){
		$data['status_login']	= Auth::check();
		$data['list_product'] 	= tbl_mobil::orderBy('id','asc')->get();

	    return view('katalog',$data);
	}

	public function contact(Request $request){
		$data['status_login']	= Auth::check();

	    return view('contact',$data);
	}

	public function order(Request $request){
		$data['status_login']	= Auth::check();
		$data['list_product'] = DB::table('tbl_sewa')
            ->join('tbl_mobil', 'tbl_sewa.id_mobil', '=', 'tbl_mobil.id')
            ->join('users', 'tbl_sewa.id_user', '=', 'users.id')
            ->select('users.name', 'tbl_mobil.nama', 'tbl_mobil.kilometer', 'tbl_mobil.id')
            ->get();

	    return view('order',$data);
	}

	public function sewa_id($id){
		$data['status_login']	= Auth::check();
		$data['id'] = $id;
		$data['list_product'] 	= tbl_mobil::where('id',$id)->get();

		$data['list_riwayat'] = DB::table('tbl_riwayat')
        	    ->join('tbl_vendor', 'tbl_riwayat.id_vendor', '=', 'tbl_vendor.id')
                ->where('tbl_riwayat.id_mobil', '=', $id)
                ->get();

		$data['list_riwayat_limit'] = DB::table('tbl_riwayat')
        	    ->join('tbl_vendor', 'tbl_riwayat.id_vendor', '=', 'tbl_vendor.id')
                ->where('tbl_riwayat.id_mobil', '=', $id)
                ->orderBy('kilometer','desc')
				->limit(3)
                ->get();

    	return view('detailkatalog',$data);
	}
	
	public function booking(Request $request){
		$data['status_login']	= Auth::check();

	    return view('katalog',$data);
	}
}