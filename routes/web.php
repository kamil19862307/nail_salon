<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function (){
    Route::view('/admin', 'admin.index', ['title' => 'Main page']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function (){
    Route::get('admin/login', [AuthController::class, 'login'])->name('login');
    Route::post('admin/login', [AuthController::class, 'signIn'])->name('admin.signIn');
});

Route::prefix('admin')->middleware('auth')->controller(PostController::class)->group(function (){
    Route::get('/posts', 'index')->name('admin.posts');
    Route::get('/posts/create', 'create')->name('admin.posts.create');
    Route::post('/posts/create', 'store')->name('admin.posts.store');
    Route::get('/posts/{post}/edit', 'edit')->name('admin.posts.edit');
    Route::patch('/posts/{post}', 'update')->name('admin.posts.update');
    Route::delete('/posts/{post}', 'destroy')->name('admin.posts.destroy');
});
