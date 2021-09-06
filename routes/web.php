<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// User
Route::get('service-fees', function(){
    return view('user.service-fees');
})->name('servicefees');
Route::get('about', function(){
    return view('user.about');
})->name('about');
Route::get('profile', function(){
    // TEMPORARY
    return view('user.profile');
})->name('userprofile');

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
