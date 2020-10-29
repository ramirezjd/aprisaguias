<?php

use App\Http\Controllers\GuiaController;
use App\estado;
use App\municipio;
use App\ciudad;
use App\parroquia;
use App\zip_code;
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


Route::get('/parroquias', 'ParroquiaController@getChild')->name('request_parroquia');

Route::get('/ciudades', 'MunicipioController@getChild2')->name('request_ciudad');

Route::get('/municipios', 'MunicipioController@getChild')->name('request_municipio');

Route::get('/estados', 'EstadoController@getChild')->name('request_estado');





Route::get('/testing', function () {
    return view('testing-form', [
        'estados' => estado::orderBy('estado')->get(),
        'municipios' => municipio::orderBy('municipio')->get(),
        'ciudades' => ciudad::orderBy('ciudad')->get(),
        'parroquias' => parroquia::orderBy('parroquia')->get(),
        'zip_codes' => zip_code::orderBy('zip_code')->get()
    ]);
});


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::resource('/guias', 'GuiaController');
});
//Route::get('/guias/create', 'GuiaController@create');



Route::post('/mun', function (Request $request) {

    $estado_id = $request->estado_id;
    var_dump($estado_id);
    $municipios = municipio::where('estado_id',$estado_id)->get();

    return response()->json([
        'municipios' => $municipios
    ]);

})->name('mun');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
