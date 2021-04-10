<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;
use App\Mail\EventosMailable;
use App\Http\Controllers\PostController;

Route::get('/index', [PostController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('posts.index');

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

Route::get('eventos', [EventoController::class, 'index'])->name('eventos.index');

Route::get('/mailable/evento', function () {
    return new EventosMailable('motivo', 'mensaje');
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
