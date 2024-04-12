<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});
Route::get('/imageuploads/create', [ImageUploadController::class, 'create'])->name('imageuploads.create');
Route::post('/imageuploads/store', [ImageUploadController::class, 'store'])->name('imageuploads.store');
Route::get('/imageuploads/{imageUpload}/edit', [ImageUploadController::class, 'edit'])->name('imageuploads.edit');
Route::put('/imageuploads/{imageUpload}/update', [ImageUploadController::class, 'update'])->name('imageuploads.update');
Route::delete('/imageuploads/{imageUpload}/destroy', [ImageUploadController::class, 'destroy'])->name('imageuploads.destroy');
Route::get('/imageuploads', [ImageUploadController::class, 'index'])->name('imageuploads.index');
require __DIR__.'/auth.php';
