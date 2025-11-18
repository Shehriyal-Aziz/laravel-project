<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookedController;

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/book', function () {
    return view('book');
});
Route::get('/menu', function () {
    return view('menu');
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

