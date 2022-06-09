<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;


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
Route::get('/pesan',[PesanController::class,'index']);

//Home Controller
Route::get('/insert/{nama}/{img}/{kilometer}', [HomeController::class, 'insertMobil']);
Route::get('/show_data', [HomeController::class, 'getAllMobil']);