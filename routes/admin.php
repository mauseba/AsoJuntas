<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventoController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\JuntaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserjunController;
use App\Http\Controllers\Admin\ActaController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home','verified')->name('admin.home');

Route::resource('users', UserController::class)->except('show')->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('posts', PostController::class)->except('show')->names('admin.posts');

Route::resource('juntas', JuntaController::class)->names('admin.juntas');

Route::resource('eventos', EventoController::class)->names('admin.eventos');

Route::resource('actas', ActaController::class)->names('admin.actas');

Route::resource('userjun',UserjunController::class)->names('admin.userjun');

Route::resource('certificados',CertificadosController::class)->names('admin.certificados');

Route::get('admin/juntas/informe',[JuntaController::class, 'informe'])->name('admin.juntas.informe');
Route::post('admin/juntas/generarinforme',[JuntaController::class, 'generar_informe'])->name('admin.juntas.generar');

Route::get('admin/userjun/informe',[UserjunController::class, 'informe'])->name('admin.userjun.informe');
Route::post('admin/userjun/generarinforme',[UserjunController::class, 'generar_informe'])->name('admin.userjun.generar');

