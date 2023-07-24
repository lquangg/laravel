<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


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
Route::get('/list',[ProductController::class, 'list'])->name('search');
Route::match(['get', 'post'], 'addProducts', [ProductController::class, 'add_products'])->name('add_products');


Route::match(['get', 'post'], '/products/edit/{id}', [ProductController::class, 'edit_products'])->name('edit_products');

Route::get('/products/delete/{id}', [ProductController::class, 'delete_products'])->name('delete_products');
//Category

Route::get('/lit',[CategoryController::class, 'lit'])->name('search');
Route::match(['get', 'post'], 'addCategory', [CategoryController::class, 'add_category'])->name('add_category');


Route::match(['get', 'post'], '/category/edit/{id}', [CategoryController::class, 'edit_category'])->name('edit_category');

Route::get('/category/delete/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');
