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
use App\Http\Controllers\Admin\ComisionController;
use App\Http\Controllers\Admin\PsuscripcionController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home', 'verified')->name('admin.home');

Route::resource('users', UserController::class)->except('show')->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('posts', PostController::class)->except('show')->names('admin.posts');

Route::resource('juntas', JuntaController::class)->except('show')->names('admin.juntas');

Route::resource('eventos', EventoController::class)->names('admin.eventos');

Route::resource('actas', ActaController::class)->except('show')->names('admin.actas');

Route::resource('userjun', UserjunController::class)->except('show')->names('admin.userjun');

Route::resource('psuscripcion', PsuscripcionController::class)->except('show')->names('admin.psuscripcion');

Route::resource('comisions', ComisionController::class)->except('show')->names('admin.comisions');

Route::get('psuscripcion/{psuscripcion}',[PsuscripcionController::class, 'buscador'])->name('admin.psuscripcion.buscador');
Route::post('psuscripcion/certificado',[PsuscripcionController::class, 'certificado'])->name('admin.psuscripcion.certificado');
Route::post('admin/psuscripcion/generarcertificado',[PsuscripcionController::class, 'generarCertificado'])->name('admin.psuscripcion.generarcer');


Route::get('admin/juntas/informe', [JuntaController::class, 'informe'])->middleware('auth')->name('admin.juntas.informe');
Route::post('admin/juntas/generarinforme', [JuntaController::class, 'generar_informe'])->middleware('auth')->name('admin.juntas.generar');

Route::get('admin/userjun/informe', [UserjunController::class, 'informe'])->middleware('auth')->name('admin.userjun.informe');
Route::post('admin/userjun/generarinforme', [UserjunController::class, 'generar_informe'])->middleware('auth')->name('admin.userjun.generar');
