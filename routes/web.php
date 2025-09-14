<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\CategoryController;


Route::get('/', [LetterController::class, 'index'])->name('letters.index');
Route::get('/letters/create', [LetterController::class, 'create'])->name('letters.create');
Route::post('/letters', [LetterController::class, 'store'])->name('letters.store');
Route::delete('/letters/{id}', [LetterController::class, 'destroy'])->name('letters.destroy');
Route::get('/letters/{id}/download', [LetterController::class, 'download'])->name('letters.download');
Route::get('/letters/{id}/preview', [LetterController::class, 'preview'])->name('letters.preview');
Route::get('/letters/{id}', [LetterController::class, 'show'])->name('letters.show');
Route::get('/letters/{id}/edit', [LetterController::class, 'edit'])->name('letters.edit');
Route::put('/letters/{id}', [LetterController::class, 'update'])->name('letters.update');
Route::get('/about', function () {
    return view('about');
})->name('about');

// Category routes
Route::get('/kategori-surat', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/kategori-surat/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/kategori-surat', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/kategori-surat/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/kategori-surat/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/kategori-surat/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
