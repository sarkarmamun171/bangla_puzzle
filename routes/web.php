<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;

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

Route::get('/dashboard', function () {
    return view('layouts.admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Category
Route::get('/category',[CategoryController::class,'add_category'])->name('add.category');
Route::post('/category/store',[CategoryController::class,'store_category'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'edit_category'])->name('edit.category');
Route::post('/category/update/{id}',[CategoryController::class,'update_category'])->name('upgate.category');
Route::get('/category/delete/{id}',[CategoryController::class,'delete_category'])->name('delete.category');
//Subcategory

Route::get('/subcategory',[SubcategoryController::class,'add_subcategory'])->name('add.subcategory');
Route::post('/subcategory/store',[SubcategoryController::class,'store_subcategory'])->name('store.subcategory');
Route::get('/subcategory/edit/{id}',[SubcategoryController::class,'edit_subcategory'])->name('edit.subcategory');
Route::post('/subcategory/update/{id}',[SubcategoryController::class,'update_subcategory'])->name('update.subcategory');
Route::get('/subcategory/delete/{id}',[SubcategoryController::class,'delete_subcategory'])->name('delete.subcategory');