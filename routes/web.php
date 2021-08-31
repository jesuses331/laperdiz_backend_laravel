<?php

use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\DenunciasController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\PerdizController;
use App\Http\Controllers\RazaController;
use Database\Factories\NoticiasFactory;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PerdizController::class, 'index'] );
Route::get('/adopciones', [PerdizController::class, 'adopciones'] )->name('paginas.adopciones');
Route::get('/denuncia', [PerdizController::class, 'denuncias'] )->name('paginas.denuncias');
Route::get('/noticia', [PerdizController::class, 'noticias'] )->name('paginas.noticias');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/listaDenuncias', [App\Http\Controllers\HomeController::class, 'denuncias'])->name('listaDenuncias');
Route::get('/listaNoticias', [App\Http\Controllers\HomeController::class, 'noticias'])->name('listaNoticias');

Route::resource('/mascotas', MascotaController::class);
Route::resource('/razas', RazaController::class);
Route::resource('/etapas', EtapaController::class);
Route::resource('/denuncias', DenunciaController::class);
Route::resource('/noticias', NoticiaController::class);
