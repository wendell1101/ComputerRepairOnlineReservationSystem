<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::group(['prefix' => '/admin'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    //Temporary
    Route::get('categories', function () {
        return view('admin.categories.index');
    })->name('categories.index');

    Route::get('products', function(){
        return view('admin.products.index');
    })->name('products.index');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
