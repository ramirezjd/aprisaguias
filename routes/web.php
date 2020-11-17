<?php

use App\Http\Controllers\GuiaController;
use App\estado;
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
    Route::resource('/permissions', 'PermissionsController')->only([
        'index', 'show', 'create', 'store'
    ]);;
    Route::resource('/remesas', 'RemesaController')->only([
        'index', 'show', 'create', 'store'
    ]);;
    Route::resource('/instalaciones', 'InstalacionController');
    Route::resource('/users', 'UserController');
    Route::resource('/guias', 'GuiaController');
});


Route::get('/parroquias', 'ParroquiaController@getChild')->name('request_parroquia');
Route::get('/ciudades', 'MunicipioController@getChild2')->name('request_ciudad');
Route::get('/municipios', 'MunicipioController@getChild')->name('request_municipio');
Route::get('/estados', 'EstadoController@getChild')->name('request_estado');
Route::post('/direccion/create', 'DireccionController@store')->name('registrar_direccion');



Route::get('/testing', function () {
    return view('testing-form', [
        'estados' => estado::orderBy('estado')->get(),
    ]);
});


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
