<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookedController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/book', function () {
    return view('book');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/password', function () {
    return view('password');
});
// admin pages
Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/contact', function () {
    return view('admin.contact');
});
Route::get('/user', function () {
    return view('admin.user');
});
Route::get('/booked', function () {
    return view('admin.booked');
});
Route::get('/order', function () {
    return view('admin.order');
});

// dynamic routes

Route::post('/booked', [BookedController::class, 'storerecord']);


Route::get('/booked', [BookedController::class, 'records']);

Route::delete('/remove/{id}', [BookedController::class, 'destroy']);

// for update
// this route take your data of product to new page 
Route::post('/edit/{id}', [ProductController::class, 'edit']);
Route::post('/product_save/{id}', [ProductController::class, 'update']);





Route::get('/menu', [ProductController::class, 'menuProductPage']);

Route::get('/menu_product', [ProductController::class, 'menuProductAdd']);


Route::post('/product_data_add', [ProductController::class, 'AddRecord']);
Route::delete('/removeFromProduct/{id}', [ProductController::class, 'destroy']);
