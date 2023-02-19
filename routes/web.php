<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

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

Route::get('reviews/create/{product}', [ReviewController::class, 'create'])->name('admin.reviews.create');
Route::post('reviews/{product}', [ReviewController::class, 'store'])->name('admin.reviews.store');

Route::resource('products', ProductController::class)->only(['index', 'show'])
    ->names([
        'index' => 'admin.products.index',
        'show' => 'admin.products.show',
    ]);

Route::get('favorite/{product}/{user}', [ProductController::class, 'addFavorite'])
    ->name('admin.favorite.store');

