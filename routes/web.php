<?php

use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function(){
    Route::get('/getpermissions', 'RolesController@getpermissions')->name('getpermissions');
    Route::resource('/permissions', 'PermissionsController');
    Route::resource('/roles', 'RolesController');
    Route::resource('/tipopaquetes', 'TipoPaqueteController');
    Route::resource('/remesas', 'RemesaController');
    Route::resource('/instalaciones', 'InstalacionController');
    Route::resource('/users', 'UserController');
    Route::get('/guias/{id}/pdf','GuiaController@pdftest')->name('pdftest');
    Route::resource('/guias', 'GuiaController');
    Route::resource('/tipo-paquetes', 'TipoPaqueteController');
    Route::resource('/transportistas', 'TransportistaController');
    Route::resource('/vehiculos', 'VehiculoController');
});

Route::get('/getMunicipios', 'DireccionController@EstadoGetMunicipios')->name('getMunicipios');
Route::get('/getCiudades', 'DireccionController@MunicipioGetCiudades')->name('getCiudades');
Route::get('/getParroquias', 'DireccionController@MunicipioGetParroquias')->name('getParroquias');
Route::get('/getZipCodes', 'DireccionController@ParroquiaGetZipCodes')->name('getZipCodes');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
