<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
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
    return view('welcome');
});

//Route kasir
Route::get('/pesan',[KasirController::class , 'index']);
Route::get('/list',[KasirController::class , 'showlist']);
Route::post('/pesan/tambah_pesan',[KasirController::class , 'order']);
Route::get('/pesan/{id}', [KasirController::class, 'tambahpesan']);
Route::get('/cetak/{id}', [KasirController::class, 'cetakpesan']);

// Route::middleware('auth')
Auth::routes();


//Route Admin
Route::group(['middleware' => 'auth','prefix' => 'admin'],function () {
    Route::get('/dashboard',[AdminController::class, 'index']);


    Route::get('/datapesan', [PesananController::class, 'showpesan'])->name('datapesan');
    Route::delete('/hapus_pesan/{id}',[PesananController::class, 'hapuspesan']);
    


    Route::get('/datameja',[MejaController::class, 'showmeja'])->name('datameja');
    Route::post('/tambah_meja',[MejaController::class, 'tambahmeja']);
    Route::put('/edit_meja/{id}',[MejaController::class, 'editmeja']);
    Route::delete('/hapus_meja/{id}',[MejaController::class, 'hapusmeja']);


    Route::get('/datamenu',[MenuController::class, 'showmenu'])->name('datamenu');
    Route::post('/tambah_menu',[MenuController::class, 'tambahmenu']);
    Route::put('/edit_menu/{id}',[MenuController::class, 'editmenu']);
    Route::delete('/hapus_menu/{id}', [MenuController::class, 'hapusmenu'])->name('menu.delete');


    Route::get('/datakategori',[KategoriController::class, 'showkategori'])->name('datakategori');
    Route::post('/tambah_kategori',[KategoriController::class, 'tambahkategori']);
    Route::put('/edit_kategori/{id}',[KategoriController::class, 'editkategori']);
    Route::delete('/hapus_kategori/{id}',[KategoriController::class, 'hapuskategori']);
});
