<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

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

Route::get('/get-files', [FileController::class, 'getFiles']);
Route::post('/upload', [FileController::class, 'fileUpload']);
Route::get('/file/{id}/edit', [FileController::class, 'fileEdit']);
Route::post('/file/{id}/update', [FileController::class, 'fileUpdate']);
Route::delete('/delete/{id}', [FileController::class, 'deleteFile']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
