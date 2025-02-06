<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProdukController::class, 'index']);
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::post('/produk', [ProdukController::class, 'store']);
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit']);
Route::put('/produk/{id}', [ProdukController::class, 'update']);
Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);