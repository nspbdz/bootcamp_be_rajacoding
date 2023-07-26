<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// /dony ini sebagai url yang di akses
// UserController controller yang ingin digunakan
// index ini diambil dari dalam controller example public function index

Route::get('/dony', [UserController::class, 'dony']);
Route::get('/', [UserController::class, 'index']);
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

Route::get('/product/add', [ProductController::class, 'add'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/test', [TestController::class, 'index'])->name('test.index');
Route::get('/calculateDistance', [TestController::class, 'calculateDistance'])->name('test.calculateDistance');
