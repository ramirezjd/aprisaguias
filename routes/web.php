<?php

use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

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

Route::get('/traking/{codigo}','GuiaController@traking')->name('traking');
Route::get('/getMunicipios', 'DireccionController@EstadoGetMunicipios')->name('getMunicipios');
Route::get('/getCiudades', 'DireccionController@MunicipioGetCiudades')->name('getCiudades');
Route::get('/getParroquias', 'DireccionController@MunicipioGetParroquias')->name('getParroquias');
Route::get('/getZipCodes', 'DireccionController@ParroquiaGetZipCodes')->name('getZipCodes');
Route::get('/getAddress', 'DireccionController@getAddress')->name('getAddress');

Route::middleware('auth')->group(function(){
    Route::get('/getpermissions', 'RolesController@getpermissions')->name('getpermissions');
    Route::resource('/permissions', 'PermissionsController');
    Route::resource('/roles', 'RolesController');
    Route::resource('/tipopaquetes', 'TipoPaqueteController');
    Route::get('/remesas/recibir', 'RemesaController@recibir')->name('recibir');
    Route::get('/remesas/imprimir', 'RemesaController@imprimir')->name('imprimirremesa');
    Route::get('/remesas/terminar', 'RemesaController@terminar');
    Route::resource('/remesas', 'RemesaController');
    Route::resource('/instalaciones', 'InstalacionController');
    Route::resource('/users', 'UserController');
    Route::get('/guias/entregar', 'GuiaController@entregar')->name('entregarguia');
    Route::get('/guias/{id}/pdf','GuiaController@pdftest')->name('pdftest');
    Route::resource('/guias', 'GuiaController');
    Route::resource('/tipo-paquetes', 'TipoPaqueteController');
    Route::resource('/transportistas', 'TransportistaController');
    Route::resource('/vehiculos', 'VehiculoController');
});

Route::get('qrcode', function () {

    /*$image = \QrCode::format('png')->size(200)->generate('This was just a test');
    $output_file = '/img/qr-code/img-' . time() . '.png';
    Storage::disk('local')->put($output_file, $image);*/
    //return QrCode::size(300)->format('png')->generate('A basic example of QR code! Nicesnippets.com');
    return view('qrcode');

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
