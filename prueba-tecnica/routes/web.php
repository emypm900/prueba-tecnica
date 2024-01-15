<?php

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
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/review', [App\Http\Controllers\reviewController::class, 'index'])->name('review');
Route::get('/book', [App\Http\Controllers\bookController::class, 'index'])->name('book');
Route::get('/books/search', [App\Http\Controllers\bookController::class, 'index'])->name('books.search');



Auth::routes();

Route::get('/createReviews', [App\Http\Controllers\reviewController::class, 'create'])->name('review.create');
Route::post('/reviews/store', [App\Http\Controllers\reviewController::class, 'store'])->name('review.store');
Route::get('/editReviews/{id}', [App\Http\Controllers\reviewController::class, 'edit'])->name('review.edit');
Route::post('/reviews/update/{id}', [App\Http\Controllers\reviewController::class, 'update'])->name('review.update');
Route::get('/deleteReviews/{id}', [App\Http\Controllers\reviewController::class, 'destroy'])->name('review.destroy');

Route::get('/createBooks', [App\Http\Controllers\bookController::class, 'create'])->name('book.create');
Route::post('/books/store', [App\Http\Controllers\bookController::class, 'store'])->name('book.store');
Route::get('/editBooks/{id}', [App\Http\Controllers\bookController::class, 'edit'])->name('book.edit');
Route::post('/books/update/{id}', [App\Http\Controllers\bookController::class, 'update'])->name('book.update');
Route::get('/deleteBooks/{id}', [App\Http\Controllers\bookController::class, 'destroy'])->name('book.destroy');




