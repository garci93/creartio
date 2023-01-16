<?php

use App\Http\Controllers\ColeccionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ComentarioController;
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



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return redirect()->to('/publicaciones');
});

Route::group(['middleware' => 'admin'], function() {
    Route::resource('reportes',ReporteController::class);
    Route::resource('usuarios',UsuarioController::class);
  });
Route::group(['middleware' => 'auth'], function() {
    Route::resource('publicaciones',PublicacionController::class);
    Route::resource('comentarios',ComentarioController::class);
    Route::resource('coleccion',ColeccionController::class);
    Route::resource('reportes',ReporteController::class,['only' => ['create']]);

});
Route::get('/', function () {
    return view('index');
});
Route::any('profile/{nombre}',[UsuarioController::class,'profile'])->name('profile.index');
Route::any('coleccion/{nombre}',[UsuarioController::class,'coleccion'])->name('coleccion.index');


Route::get('image-upload', [ ImageUploadController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');
