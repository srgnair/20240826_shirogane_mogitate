<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\DetailController;

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

Route::prefix('products')->group(function () {
    Route::get('/', [ListController::class, 'listView'])->name('listView');

    Route::prefix('search')->group(function () {
        Route::get('/', [ListController::class, 'search'])->name('search');
        Route::get('/reset-sort', [ListController::class, 'resetSort'])->name('resetSort');
        Route::get('/reset-keyword', [ListController::class, 'resetKeyword'])->name('resetKeyword');
    });

    Route::get('/register', [RegisterController::class, 'registerView'])->name('registerView');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::prefix('{productId}')->group(function () {
        Route::get('/', [DetailController::class, 'detailView'])->name('detailView');
        Route::post('/update', [DetailController::class, 'update'])->name('update');
        Route::delete('/delete', [DetailController::class, 'delete'])->name('delete');
    });
});

