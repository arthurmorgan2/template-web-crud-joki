<?php

use App\Http\Controllers\GuruController;
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

Route::get('/', [GuruController::class, 'index']);
Route::post('/guru/create', [GuruController::class, 'create'])->name('create');
Route::put('/guru/update/{id}', [GuruController::class, 'update'])->name('update');
Route::post('/guru/delete', [GuruController::class, 'delete'])->name('delete');


