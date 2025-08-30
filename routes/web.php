<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = \App\Models\Post::paginate(5);
    return view('index', compact('posts'));
});
