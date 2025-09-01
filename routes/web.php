<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = \App\Models\Post::paginate(5);
    return view('index', compact('posts'));
})->name('home');

Route::get('login', function () {
    return view('users.auth.login');
})->name('login');

Route::get('register', function () {
    return view('users.auth.register');
})->name('register');