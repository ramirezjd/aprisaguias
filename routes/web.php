<?php

use App\Http\Controllers\GuiaController;
use App\municipio;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/guias', 'GuiaController')->middleware('auth');;
//Route::get('/guias/create', 'GuiaController@create');

Route::post('/mun', function (Request $request) {

    $estado_id = $request->estado_id;

    $municipios = municipio::where('estado_id',$estado_id)
                          ->get();

    return response()->json([
        'municipios' => $municipios
    ]);

})->name('mun');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
