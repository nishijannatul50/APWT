<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[pagesController::class, 'homepage'])->name('home');
Route::get('/service',[pagesController::class, 'servicepage'])->name('service');
Route::get('/about',[pagesController::class, 'aboutpage'])->name('about');
Route::get('/contact',[pagesController::class, 'contactpage'])->name('contact');
Route::get('/teams',[pagesController::class, 'teamspage'])->name('teams');