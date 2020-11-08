<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    $title = 'Login';
    return view('auth.login', ['title' => $title]);
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('bus', 'BusController')->parameters(['bus' => 'bus'])->middleware('auth');
Route::resource('brand', 'BrandController')->middleware('auth');
Route::resource('pegawai', 'PegawaiController')->middleware('auth');
Route::resource('pelanggan', 'PelangganController')->middleware('auth');

// Route Pemesanan
Route::get('list-member', 'PemesananController@listMember' )->middleware('auth');
Route::get('pemesanan', ['as' => 'pemesanan.index', 'uses' => 'PemesananController@index' ])->middleware('auth');
Route::post('pemesanan/process', ['as' => 'pemesanan.process', 'uses' => 'PemesananController@process'])->middleware('auth');
Route::post('create-pelanggan', ['as' => 'create-pelanggan', 'uses' => 'PemesananController@createPelanggan' ])->middleware('auth');
Route::post('pemesanan/details', ['as' => 'pemesanan.calculate', 'uses' => 'PemesananController@calculate'])->middleware('auth');

// Route Pengembalian
Route::get('pengembalian', ['as' => 'pengembalian.index', 'uses' => 'PengembalianController@index' ])->middleware('auth');
Route::get('pengembalian/information', ['as' => 'pengembalian.information', 'uses' => 'PengembalianController@information'])->middleware('auth');
Route::post('pengembalian/process', ['as' => 'pengembalian.process', 'uses' => 'PengembalianController@process'])->middleware('auth');