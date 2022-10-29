<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware('auth')->prefix('/admin')->group(function () {

    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
    
    Route::get('/product/{id}/show',[ProductController::class,'show'])->name('product.show');
    Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::patch('/product/{id}/update',[ProductController::class,'update'])->name('product.update');
    Route::delete('/product/{id}/destroy',[ProductController::class,'destroy'])->name('product.destroy');
});
