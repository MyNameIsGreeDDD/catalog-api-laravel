<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewsController;

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

Route::get('reviews/create/{product}', [ReviewsController::class, 'create'])->name('admin.reviews.create');
Route::post('reviews/{product}', [ReviewsController::class, 'store'])->name('admin.reviews.store');

Route::resource('products', ProductController::class)->only(['index'])
    ->name('index', 'admin.products.index');
