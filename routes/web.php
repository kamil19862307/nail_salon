<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::view('/admin', 'admin.index', ['title' => 'Main page']);

Route::prefix('admin')->controller(PostController::class)->group(function (){
    Route::get('/posts', 'index')->name('admin.posts');
    Route::get('/posts/create', 'create')->name('admin.posts.create');
});
