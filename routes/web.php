<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo 123;
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/test/{id}', function ($id) {
    echo $id;
    return view('test-detail', ['id' => $id]);
})->name('test.id');
