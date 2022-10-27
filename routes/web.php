<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ContentsController;
use App\Http\Controllers\Admin\PhotoGallery\PhotoGalleryController;
use App\Http\Controllers\Admin\PhotoGallery\PhotoGalleryImageController;
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

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'photo-galleries', 'as' => 'photo_galleries.', 'middleware' => 'auth'], function() {
        Route::get('/', [PhotoGalleryController::class, 'index'])->name('index');
        Route::get('/create', [PhotoGalleryController::class, 'create'])->name('create');
        Route::post('/store', [PhotoGalleryController::class, 'store'])->name('store');
        Route::get('/disable/{id}', [PhotoGalleryController::class, 'disable'])->name('disable');
        Route::get('/edit/{id}', [PhotoGalleryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [PhotoGalleryController::class, 'update'])->name('update');

        Route::group(['prefix' => 'images', 'as' => 'images.'], function() {
            Route::get('/create/{gallery_id}', [PhotoGalleryImageController::class, 'create'])->name('create');
            Route::post('/store', [PhotoGalleryImageController::class, 'store'])->name('store');
        });
});

Route::group(['prefix' => 'content', 'as' => 'content.', 'middleware' => 'auth'], function() {
    Route::get('/edit/{type}', [ContentsController::class, 'edit'])->name('edit');
    Route::get('/update/{type}', [ContentsController::class, 'update'])->name('update');
});
require __DIR__.'/auth.php';
