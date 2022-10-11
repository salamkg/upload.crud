<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\AppController;

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

Route::get('/token', function () {
    return csrf_token(); 
});
Route::get('/', [AppController::class, 'index']);
Route::post('/upload', [FileController::class, 'fileUpload']);
// Route::get('/file/{id}/edit', [FileController::class, 'fileEdit']);
// Route::post('/file/{id}/update', [FileController::class, 'fileUpdate']);
Route::get('/get-file/{id}', [FileController::class, 'getFile']);
