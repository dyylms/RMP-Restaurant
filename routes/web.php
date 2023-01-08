<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\KasirController;

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
    return view('Login.login');
});
//dashboard
Route::group(['middleware' => ['auth','ceklevel:admin,manajer,kasir']], function () {
    route::get('/home',[HomeController::class,'index'])->name('home');

});
// Route Admin
route::group(['middleware' => ['auth', 'ceklevel:admin']] , function(){
Route::resource('users', UserController::class);
});
// Route Manager
route::group(['middleware' => ['auth', 'ceklevel:manajer']] , function(){
Route::resource('Manajer', ManagerController::class);
Route::get('laporan',[ManagerController::class, 'laporan'])->name('laporan');
Route::get('search',[ManagerController::class, 'search'])->name('search');
Route::get('laporan/pdf',[ManagerController::class, 'cetak'])->name('cetak');
Route::get('laporan/ctk',[ManagerController::class, 'ctk'])->name('ctk');
});

// Route Kasir
route::group(['middleware' => ['auth', 'ceklevel:kasir']] , function(){
Route::resource('Kasir', KasirController::class);
});

// Login
route::get('/login',[LoginController::class,'halamanlogin'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');


