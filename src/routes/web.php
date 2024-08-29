<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpdateController;
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

Route::get('/products', [ListController::class, 'listView'])->name('listView');

Route::get('/products/register', [RegisterController::class, 'registerView'])->name('registerView');
Route::post('/products/register', [RegisterController::class, 'register'])->name('register');

Route::get('/products/{productId}', [DetailController::class, 'detailView'])->name('detailView');
Route::post('/products/{productId}', [DetailController::class, 'update'])->name('update');
