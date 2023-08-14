<?php

use App\Http\Controllers\NhanVienController;
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
    return view('welcome');
});
Route::get('/list',[NhanVienController::class,'list'])->name('list');
Route::post('/list',[NhanVienController::class,'list'])->name('search');
Route::match(['GET','POST'],'/add',[NhanVienController::class,'add'])->name('add');
Route::match(['GET','POST'],'/edit/{id}',[NhanVienController::class,'edit'])->name('edit');