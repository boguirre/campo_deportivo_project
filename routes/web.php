<?php

use App\Http\Controllers\CamposController;
use App\Http\Controllers\CentroDeportivoController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.main');
})->name('home');

Route::get('/campo-detalles', function () {
    return view('campos.show');
})->name('show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::resource('menu-principal', MenuController::class);
Route::resource('campos', CamposController::class)->names('campo');
Route::resource('complejos', CentroDeportivoController::class)->middleware('auth')->names('centro');
Route::post('campos/upload/images', [CamposController::class, 'uploadImages'])->middleware('auth')->name('upload-images');
Route::post('complejos/upload/images', [CentroDeportivoController::class, 'uploadImagesComplejos'])->middleware('auth')->name('upload-images-complejos');


