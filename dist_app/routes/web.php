<?php

use App\Http\Controllers\PaisController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\CiudadController;
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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [PaisController::class, 'index']);
    Route::get('/home', [PaisController::class, 'index'])->name('home');
    Route::resource('pais', PaisController::class);
});

Auth::routes();

Route::prefix('/pais/{id}')->group( function($id){
    Route::get('provincias', [ProvinciaController::class, 'index'])->name('prov_index');
    Route::post('provincias', [ProvinciaController::class, 'store'])->name('add_prov');
    Route::put('provincias', [ProvinciaController::class, 'update'])->name('edit_prov');
    Route::delete('provincias', [ProvinciaController::class, 'destroy'])->name('del_prov');
});

Route::prefix('/provincias/{id}')->group( function($id){
    Route::get('ciudades', [CiudadController::class, 'index'])->name('ci_index');
    Route::post('ciudades', [CiudadController::class, 'store'])->name('create_ci');
    Route::put('ciudades', [CiudadController::class, 'update'])->name('edit_ci');
    Route::delete('ciudades', [CiudadController::class, 'destroy'])->name('del_ci');
});


