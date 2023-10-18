<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('lojas')->group(function(){
    Route::get('/', [App\Http\Controllers\LojaController::class, 'index'])->name('lojas.index');
    Route::get('/create', [App\Http\Controllers\LojaController::class, 'create'])->name('lojas.create');
    Route::post('/store', [App\Http\Controllers\LojaController::class, 'store'])->name('lojas.store');
});

