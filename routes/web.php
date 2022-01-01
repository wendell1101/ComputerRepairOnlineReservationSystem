<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductCategoryController;

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index');

// User
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'check_status', 'check_if_user'); // temporary

// Cart
Route::group(['prefix' => '/cart'], function(){
    Route::get('/', 'CartController@index');
});

Route::get('/services', 'ClientServiceController@index')->name('servicefees');

Route::get('/store', 'ClientStoreController@index')->name('user.store');

Route::get('about', function(){
    return view('user.about');
})->name('about');
Route::get('contacts', function(){
    return view('user.contact');
})->name('contacts');

Route::get('profile', function(){
    // TEMPORARY
    return view('user.profile');
})->name('user.profile')->middleware('auth', 'check_status', 'check_if_user');



Route::get('/reservation', function(){
    return view('user.reservations.index');
})->name('user.reservations')->middleware('auth', 'check_status', 'check_if_user');

Route::get('/reservation/create', function(){
    // TEMPORARY
    return view('user.reservations.create');
})->name('user.create')->middleware('auth', 'check_status', 'check_if_user');

// Route::get('/reservation/edit', function(){
//     // TEMPORARY
//     return view('user.reservations.edit');
// })->name('user.edit')->middleware('auth', 'check_status', 'check_if_user');


// Admin
Route::group(['prefix' => '/admin'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    //Temporary
    // Route::get('categories', function () {
    //     return view('admin.categories.index');
    // })->name('categories.index')->middleware('auth', 'check_status', 'check_if_admin');

    Route::resource('categories', 'ProductCategoryController');
    Route::resource('xcategory_services', 'ServiceCategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('services', 'ServiceController');
    Route::resource('users', 'AdminUserController');


    // Route::get('products', function(){
    //     return view('admin.products.index');
    // })->name('products.index')->middleware('auth', 'check_status', 'check_if_admin');

    // Route::get('products/create', function(){
    //     return view('admin.products.create');
    // })->name('products.create')->middleware('auth', 'check_status', 'check_if_admin');

    // Route::get('products/edit', function(){
    //     return view('admin.products.edit');
    // })->name('products.edit')->middleware('auth', 'check_status', 'check_if_admin');

    // Route::get('reservations', function(){
    //     return view('admin.reservations.index');
    // })->name('reservations.index')->middleware('auth', 'check_status', 'check_if_admin');

    // Route::get('printing', function(){
    //     return view('admin.printing.index');
    // })->name('printing.index')->middleware('auth', 'check_status', 'check_if_admin');

    // Route::get('printing/create', function(){
    //     return view('admin.printing.create');
    // })->name('printing.create')->middleware('auth', 'check_status', 'check_if_admin');

    // Route::get('printing/edit', function(){
    //     return view('admin.printing.edit');
    // })->name('printing.edit')->middleware('auth', 'check_status', 'check_if_admin');

    // Route::get('users', function(){
    //     return view('admin.users.index');
    // })->name('users.index')->middleware('auth', 'check_status', 'check_if_admin');

    // Route::get('users/view', function(){
    //     return view('admin.users.view');
    // })->name('users.view')->middleware('auth', 'check_status', 'check_if_admin');

});



Auth::routes();
