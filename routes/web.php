<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

// Controller Login
Route::get('/login',[LoginController::class,'login']);
Route::post('/login/auth',[LoginController::class,'auth_process']);

Route::get('/register',[LoginController::class,'register']);
Route::post('/register/add',[LoginController::class,'add_user']);

Route::get('/logout',[LoginController::class,'logout']);

// Controller Home
Route::get('/home',[HomeController::class,'index']);

// Controller Pesan
Route::get('/katalog',[OrderController::class,'index']);
Route::get('/katalog/sewa/{id}',[OrderController::class,'sewa_id']);
Route::get('/katalog/servis/{id}',[OrderController::class,'servis_id']);
Route::get('/katalog/sewa/pesan/{id}',[OrderController::class,'booking']);
Route::get('/katalog/servis/tambah/{id}',[OrderController::class,'tambah_servis']);
Route::get('/katalog/servis/tambahkilometer/{id}',[OrderController::class,'tambah_kilometer']);
Route::post('/katalog/servis/tambahkilometer/update/',[OrderController::class,'update_kilometer']);
Route::post('/katalog/servis/tambah/submit',[OrderController::class,'submit_servis']);
Route::post('/katalog/sewa/pesan/submit',[OrderController::class,'submit_form']);


Route::get('/myorder',[OrderController::class,'order']);

//Home Controller
Route::get('/cars',[HomeController::class,'getAllMobil']);
Route::post('/insertMobil', [HomeController::class, 'insertMobil']);
Route::get('/delete/{id}', [HomeController::class, 'deleteMobil']);
Route::get('/editMobil/{id}', [HomeController::class, 'getForUpdateMobil']);
Route::post('/edit', [HomeController::class, 'updateMobil']);
Route::get('/show_data', [HomeController::class, 'getAllMobil']);

Route::get('/contactus',[OrderController::class,'contact']);
Route::get('/myorder',[OrderController::class,'order']);

Route::get('/servicemanager',[ServiceController::class,'index']);

//Service mobil
Route::get('/service', [HomeController::class, 'getAllVendor']);
Route::get('/daftarService/{id}/{flag}', [HomeController::class,'getForUpdateMobil']);
Route::post('/serviceMobil', [HomeController::class, 'insertRiwayat']);