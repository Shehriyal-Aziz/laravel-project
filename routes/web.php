<?php

use Illuminate\Support\Facades\Route;

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
