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
Route::group(['middleware' => 'auth'],function(){
    Route::get('/home',[App\Http\Controllers\BarangController::class, 'index'])->name('dashboard');
    Route::get('/home/create',[App\Http\Controllers\BarangController::class, 'createIndex'])->name('create');
    Route::post('/home/create',[App\Http\Controllers\BarangController::class, 'createPost'])->name('create');
    Route::post('/home/delete',[App\Http\Controllers\BarangController::class, 'delete'])->name('delete');
    Route::get('/home/edit/{id}',[App\Http\Controllers\BarangController::class, 'editIndex'])->name('edit');
    Route::post('/home/edit/',[App\Http\Controllers\BarangController::class, 'editPost'])->name('edit');
});
