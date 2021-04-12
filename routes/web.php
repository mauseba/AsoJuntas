<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\BeneficiariosController;
use App\Http\Controllers\CensoController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');



Route::get('beneficiarios', [BeneficiariosController::class, 'index'])->name('beneficiarios.index')->middleware('auth');;
Route::post('beneficiarios', [BeneficiariosController::class, 'store'])->middleware('auth');
Route::patch('beneficiarios/{beneficiarios}', [BeneficiariosController::class, 'update'])->middleware('auth');;
Route::get('beneficiarios/{beneficiarios}/edit', [BeneficiariosController::class, 'edit'])->middleware('auth');;

Route::resource('censo', CensoController::class)->middleware('auth');;

// Route::resource('beneficiarios', [BeneficiariosController::class]);

Route::get('censo-pdf',[CensoController::class, 'exportPdf'])->name('censo.pdf');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
