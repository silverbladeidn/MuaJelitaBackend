<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\Login@index');
Route::get('logout', 'App\Http\Controllers\Login@logout');
Route::get('lupa', 'App\Http\Controllers\Login@lupa');
Route::post('proses', 'App\Http\Controllers\Login@proses');

Route::get('admin/user', 'App\Http\Controllers\Admin\Portofolio@index');
Route::get('admin/user/tambah', 'App\Http\Controllers\Admin\Portofolio@tambah');
Route::get('admin/user/edit/{id}', 'App\Http\Controllers\Admin\Portofolio@edit');
Route::get('admin/user/delete/{id}', 'App\Http\Controllers\Admin\Portofolio@delete');
Route::post('admin/portofolio/proses-tambah', 'App\Http\Controllers\Admin\Portofolio@proses_tambah');
Route::post('admin/portofolio/proses-edit', 'App\Http\Controllers\Admin\Portofolio@proses_edit');

Route::get('api/portfolio', 'App\Http\Controllers\Api\PortfolioController@index');
Route::get('api/portfolio/{id}', 'App\Http\Controllers\Api\PortfolioController@show');
