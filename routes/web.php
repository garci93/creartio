<?php

use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ColeccionController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;

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
    return view('index');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => 'admin'], function() {
    Route::resource('usuarios',UsuarioController::class);
    Route::resource('reportes',ReporteController::class);
  });
Route::group(['middleware' => 'auth'], function() {
    Route::resource('galerias',GaleriaController::class);
    Route::resource('publicaciones',PublicacionController::class);
    Route::resource('colecciones',ColeccionController::class);
    Route::resource('reportes',ReporteController::class,['only' => ['create']]);
});

Route::get('image-upload', [ ImageUploadController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');
