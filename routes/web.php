<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PromoterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [IndexController::class, 'home'])->name('home');

Route::middleware('auth')->group(function ()
{
    Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // EVENTOS
    Route::get('/eventos/list', [EventosController::class, 'index'])->name('eventos.list');
    Route::get('/eventos/form', [EventosController::class, 'form'])->name('eventos.form');
    Route::get('/eventos/{id}', [EventosController::class, 'open'])->name('eventos.open');
    Route::patch('/eventos/edit', [EventosController::class, 'update'])->name('eventos.update');
    Route::patch('/eventos/create', [EventosController::class, 'create'])->name('eventos.create');
    Route::delete('/eventos/delete/{id}', [EventosController::class, 'delete'])->name('eventos.delete');

    // USER
    Route::get('/promoter/list', [PromoterController::class, 'index'])->name('promoter.list');
    Route::get('/promoter/form', [PromoterController::class, 'form'])->name('promoter.form');
    Route::get('/promoter/{id}', [PromoterController::class, 'open'])->name('promoter.open');
    Route::patch('/promoter/edit', [PromoterController::class, 'update'])->name('promoter.update');
    Route::patch('/promoter/create', [PromoterController::class, 'create'])->name('promoter.create');
    Route::delete('/promoter/delete/{id}', [PromoterController::class, 'delete'])->name('promoter.delete');

});

require __DIR__.'/auth.php';