<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;

// default page is login page
Route::get('/', 'App\Http\Controllers\Home@index');

// route login
Route::get('login', 'App\Http\Controllers\Login@index');
Route::get('login/logout', 'App\Http\Controllers\Login@logout');
Route::get('logout', 'App\Http\Controllers\Login@logout');
Route::get('login/lupa', 'App\Http\Controllers\Login@lupa');
Route::post('login/proses', 'App\Http\Controllers\Login@proses');

// route ari
Route::get('ari', 'App\Http\Controllers\Ari@index');
Route::get('ari/beranda', 'App\Http\Controllers\Ari@beranda');
Route::get('ari/profil', 'App\Http\Controllers\Ari@profil');
Route::get('ari/kontak', 'App\Http\Controllers\Ari@kontak');

// peta
Route::get('peta', 'App\Http\Controllers\Peta@index');

Route::middleware([CheckLogin::class])->group(function () {
	// ADMINISTRATOR ROUTE
	// dasbor
	Route::get('admin/dasbor', 'App\Http\Controllers\Admin\Dasbor@index');

	// peta
	Route::get('admin/peta', 'App\Http\Controllers\Admin\Peta@index');

	// user dan pengguna
	Route::get('admin/user', 'App\Http\Controllers\Admin\User@index');
	Route::get('admin/user/tambah', 'App\Http\Controllers\Admin\User@tambah');
	Route::get('admin/user/edit/{id}', 'App\Http\Controllers\Admin\User@edit');
	Route::get('admin/user/delete/{id}', 'App\Http\Controllers\Admin\User@delete');
	Route::post('admin/user/proses-tambah', 'App\Http\Controllers\Admin\User@proses_tambah');
	Route::post('admin/user/proses-edit', 'App\Http\Controllers\Admin\User@proses_edit');

	// jenis-produk
	Route::get('admin/jenis-produk', 'App\Http\Controllers\Admin\Jenis_produk@index');
	Route::get('admin/jenis-produk/tambah', 'App\Http\Controllers\Admin\Jenis_produk@tambah');
	Route::get('admin/jenis-produk/edit/{id}', 'App\Http\Controllers\Admin\Jenis_produk@edit');
	Route::get('admin/jenis-produk/delete/{id}', 'App\Http\Controllers\Admin\Jenis_produk@delete');
	Route::post('admin/jenis-produk/proses-tambah', 'App\Http\Controllers\Admin\Jenis_produk@proses_tambah');
	Route::post('admin/jenis-produk/proses-edit', 'App\Http\Controllers\Admin\Jenis_produk@proses_edit');

	// konsumsi
	Route::get('admin/konsumsi', 'App\Http\Controllers\Admin\Konsumsi@index');
	Route::get('admin/konsumsi/tambah', 'App\Http\Controllers\Admin\Konsumsi@tambah');
	Route::get('admin/konsumsi/edit/{id}', 'App\Http\Controllers\Admin\Konsumsi@edit');
	Route::get('admin/konsumsi/delete/{id}', 'App\Http\Controllers\Admin\Konsumsi@delete');
	Route::post('admin/konsumsi/proses-tambah', 'App\Http\Controllers\Admin\Konsumsi@proses_tambah');
	Route::post('admin/konsumsi/proses-edit', 'App\Http\Controllers\Admin\Konsumsi@proses_edit');
	Route::get('admin/konsumsi/get-kabupaten', 'App\Http\Controllers\Admin\Konsumsi@get_kabupaten');

	//api-konsumsi
	Route::get('admin/konsumsi/all', 'App\Http\Controllers\Admin\Konsumsi@all');
	Route::get('admin/konsumsi/data', 'App\Http\Controllers\Admin\Konsumsi@data');
	Route::post('admin/konsumsi/proses-add', 'App\Http\Controllers\Admin\Konsumsi@proses_add');
	Route::post('admin/konsumsi/proses-update', 'App\Http\Controllers\Admin\Konsumsi@proses_update');
	Route::get('admin/konsumsi/hapus/{id}', 'App\Http\Controllers\Admin\Konsumsi@hapus');
});

