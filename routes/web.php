<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo 123;
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});
