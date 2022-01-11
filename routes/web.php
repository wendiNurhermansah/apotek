<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::prefix('MasterRole')->namespace('masterRole')->name('MasterRole.')->group(function(){
    //role
    Route::get('addpermission/{id}', 'RoleController@permission')->name('role.addpermission');
    Route::post('storePermission', 'RoleController@storePermission')->name('storePermissions');

    Route::post('role/api', 'RoleController@api')->name('role.api');
    Route::get('getPermission/{id}', 'RoleController@getPermission')->name('getPermissions');
    Route::delete('destroyPermission/{name}', 'RoleController@destroyPermission')->name('destroyPermission');
    Route::resource('role', 'RoleController');


    //permissions
    Route::resource('permissions', 'PermissionsController');
    Route::post('permissions/api', 'PermissionsController@api')->name('permissions.api');

    //pengguna
    Route::resource('pengguna', 'PenggunaController');
    Route::post('pengguna/api', 'PenggunaController@api')->name('pengguna.api');
    Route::get('{id}/editPassword', 'PenggunaController@editPassword')->name('editPassword');
    Route::post('{id}/updatePassword', 'PenggunaController@updatePassword')->name('updatePassword');
});

Route::prefix('Asyfa')->namespace('asyfa')->name('Asyfa.')->group(function(){
    //data barang
    Route::resource('Data_barang', 'DatabarangController');
    Route::post('Data_barang/api', 'DatabarangController@api')->name('Data_barang.api');

    //jenis bararang
    Route::resource('Jenis_barang', 'JenisbarangController');
    Route::post('Jenis_barang/api', 'JenisbarangController@api')->name('Jenis_barang.api');

    //tidak di pakai
    Route::resource('Obat_Terjual', 'ObatterjualController');
    Route::post('Obat_Terjual/api', 'ObatterjualController@api')->name('Obat_Terjual.api');

    //satuan obat
    Route::resource('satuan', 'SatuanController');
    Route::post('satuan/api', 'SatuanController@api')->name('satuan.api');

    //supplier
    Route::resource('supplier', 'SupplierController');
    Route::post('supplier/api', 'SupplierController@api')->name('supplier.api');

    //transaksi tunai 
    Route::resource('transaksi_tunai', 'TunaiController');

    //list Transaksi
    Route::resource('list_transaksi', 'ListController');

    //laporan
    Route::resource('laporan_penjualan', 'LaporanController');

});



