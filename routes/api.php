<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\archivosPdfController;
use App\Http\Controllers\enviarArchivoController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/prueba',[enviarArchivoController::class, 'conexionpostgresql']);
Route::get('/obtenerpdf',[archivosPdfController::class, 'subir']);
Route::post('/subirpdf',[enviarArchivoController::class, 'enviarArchivos']);
Route::post('/subirexcel',[enviarArchivoController::class, 'enviarExcel']);
Route::get('/inscripciones',[InscripcionController::class, 'index']);
Route::get('/inscripciones/{id}',[InscripcionController::class, 'show']);
Route::post('/inscripciones',[InscripcionController::class, 'create']);
Route::delete('/inscripciones/{id}',[InscripcionController::class, 'destroy']);
Route::put('/inscripciones/{id}',[InscripcionController::class, 'edit']);