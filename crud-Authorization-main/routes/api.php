<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// routes/web.php

Route::get('/login', function () {
    // Your login logic here
});


Route::post('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::get('/mahasiswa/read', [MahasiswaController::class, 'read']);
Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);

Route::post('/dosen/create', [DosenController::class, 'create']);
Route::get('/dosen/read', [DosenController::class, 'read']);
Route::put('/dosen/update/{id}', [DosenController::class, 'update']);
Route::delete('/dosen/delete/{id}', [DosenController::class, 'delete']);

Route::post('/makul/create', [MakulController::class, 'create']);
Route::get('/makul/read', [MakulController::class, 'read']);
Route::put('/makul/update/{id}', [MakulController::class, 'update']);
Route::delete('/makul/delete/{id}', [MakulController::class, 'delete']);
