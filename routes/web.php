<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BarangController::class, 'index']) -> name('index');
Route::get('/show-barang', [BarangController::class, 'indexUser']) -> name('indexUser');
Route::post('/addcart/{id}', [BarangController::class, 'addcart']) ->name('addcart');
Route::get('/showcart', [BarangController::class, 'showcart']) ->name('showcart');
Route::middleware('isAdmin')->group(function(){
    Route::get('/list-barang', [BarangController::class, 'index']) -> name('index');
    Route::get('/create-barang', [BarangController::class, 'create']) -> name('create');
    Route::post('/store-barang', [BarangController::class, 'store']) -> name('store');
    Route::get('/edit-barang/{id}', [BarangController::class, 'edit']) -> name('edit');
    Route::patch('/update-barang/{id}', [BarangController::class, 'update']);
    Route::delete('/delete-barang/{id}', [BarangController::class, 'delete']);
    Route::get('/create-category', [CategoryController::class, 'create'])-> name('create');
    Route::post('/store-category', [CategoryController::class, 'store'])-> name('store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
