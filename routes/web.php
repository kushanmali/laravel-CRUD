<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/Products',[productController::class,'index'])->name('products.index');
Route::get('Products/create',[productController::class,'create'])->name('products.create');
Route::post('/Products',[productController::class,'store'])->name('products.store');
