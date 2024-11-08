<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::controller(AuthorController::class)->group(function(){
    Route::get('authors','index')->name('authors.index');
    Route::get('authors/archive','archive')->name('authors.archive');
    Route::get('authors/create','create')->name('authors.create');
    Route::post('authors','store')->name('authors.store');
    Route::get('authors/{author}','show')->name('authors.show');
    Route::get('authors/{author}/edit','edit')->name('authors.edit');
    Route::put('authors/{author}','update')->name('authors.update');
    Route::post('authors/{author}/restore','restore')->name('authors.restore');
    Route::delete('authors/{author}','softDelete')->name('authors.softdelete');
    Route::get('authors/forcedelete/{author}','forceDelete')->name('authors.forceDelete');

});

Route::controller(BookController::class)->group(function(){
    Route::get('books','index')->name('books.index');
    Route::get('books/archive','archive')->name('books.archive');
    Route::get('books/create','create')->name('books.create');
    Route::post('books','store')->name('books.store');
    Route::get('books/{book}','show')->name('books.show');
    Route::get('books/{book}/edit','edit')->name('books.edit');
    Route::put('books/{book}','update')->name('books.update');
    Route::post('books/{book}/restore','restore')->name('books.restore');
    Route::delete('books/{book}','softDelete')->name('books.softdelete');
    Route::get('books/forcedelete/{book}','forceDelete')->name('books.forceDelete');

});

Route::controller(CategoryController::class)->group(function(){
    Route::get('categories','index')->name('categories.index');
    Route::get('categories/archive','archive')->name('categories.archive');
    Route::get('categories/create','create')->name('categories.create');
    Route::post('categories','store')->name('categories.store');
    Route::get('categories/{category}','show')->name('categories.show');
    Route::get('categories/{category}/edit','edit')->name('categories.edit');
    Route::put('categories/{category}','update')->name('categories.update');
    Route::post('categories/{category}/restore','restore')->name('categories.restore');
    Route::delete('categories/{category}','softDelete')->name('categories.softdelete');
    Route::get('categories/forcedelete/{category}','forceDelete')->name('categories.forceDelete');
});

Route::controller(HomeController::class)->group(function(){
    Route::get('home','index')->name('home.index');
    Route::get('home/search','search')->name('home.search');
    Route::get('home/{category}','searchCategory')->name('home.category');
    Route::get('home/{book}/show','show')->name('home.show');
});

