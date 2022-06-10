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
            ->where('users.id', '=', Auth::user()->id)
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

	public function servis_id($id){
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

    	return view('detailservis',$data);
	}
	
	public function booking($id){
		$data['id'] = $id;
		$data['status_login'] = Auth::check();

	    return view('bookingform',$data);
	}

	public function tambah_servis($id){
		$data['id'] = $id;
		$data['status_login'] = Auth::check();
		$data['list_vendor'] = DB::table('tbl_vendor')
                ->orderBy('id','asc')
                ->get();
	    return view('addservis',$data);
	}

	public function tambah_kilometer($id){
		$data['id'] = $id;
		$data['status_login'] = Auth::check();
		$data['list_vendor'] = DB::table('tbl_vendor')
                ->orderBy('id','asc')
                ->get();
	    return view('addkilometer',$data);
	}

	public function submit_form(Request $request){
		$tgl_mulai = date("Y-m-d", strtotime($request->tgl_mulai));
		$tgl_akhir = date("Y-m-d", strtotime($request->tgl_akhir));

		$sewa = new tbl_sewa;
		$sewa->tgl_mulai = $request->tgl_mulai;
		$sewa->tgl_akhir = $request->tgl_akhir;
		$sewa->id_user = Auth::user()->id;
		$sewa->id_mobil = $request->id_mobil;

		$sewa->create_by = Auth::user()->role;

		$sewa->save();

	    return redirect('/myorder');
	}

	public function submit_servis(Request $request){
		$riwayat = new tbl_riwayat;
		$riwayat->id_mobil = $request->id_mobil;
		$riwayat->id_vendor = $request->id_vendor;
		$riwayat->kilometer = $request->kilometer;
		$riwayat->keluhan_kendaraan = $request->keluhan_kendaraan;

		$riwayat->create_by = Auth::user()->role;

		$riwayat->save();

		$mobil = tbl_mobil::where('id', $request->id_mobil)->first();
		$mobil->kilometer = $request->kilometer;
		
		$mobil->save();
		return redirect('/katalog/servis/'.$request->id_mobil);
	}

	public function update_kilometer(Request $request){
		$mobil = tbl_mobil::where('id', $request->id_mobil)->first();
		$mobil->kilometer = $request->kilometer;
		
		$mobil->save();

		return redirect('/katalog/servis/'.$request->id_mobil);
	}
}