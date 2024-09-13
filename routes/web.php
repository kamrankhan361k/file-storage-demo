<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/upload', [FileUploadController::class, 'create'])->name('upload.form');
Route::post('/upload', [FileUploadController::class, 'store'])->name('upload');
Route::get('/download/{filename}', [FileUploadController::class, 'download'])->name('download');