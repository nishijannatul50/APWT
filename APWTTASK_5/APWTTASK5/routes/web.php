<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\productController;

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

Route::get('/',[productController::class,'home'])->name('home');


Route::get('/product/addProduct/',[productController::class,'addProduct'])->name('addProduct');

Route::post('/product/addProduct',[productController::class,'addProductSubmit'])->name('addProductSubmit');

Route::get('/product/list/',[productController::class,'list'])->name('product/List');

Route::get('/product/edit/{id}/{name}/',[productController::class,'edit'])->name('product/edit');

Route::post('/product/edit/',[productController::class,'editSubmit'])->name('product/edit');

Route::get('/product/delete/{id}/{name}/',[productController::class,'delete'])->name('product/delete');
