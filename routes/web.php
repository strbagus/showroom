<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RefController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\MerkController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('dashboard', function () {return Inertia::render('Dashboard');})->name('dashboard');
    // Merks
    Route::get('merk', [MerkController::class, 'index'])->name('merk');
    Route::post('merk/create', [RefController::class, 'createMerk'])->name('merk.create');
    Route::get('merk/{refmerk}/edit', [RefController::class, 'editMerk'])->name('refmerk.edit');
    Route::put('merk/{refmerk}', [RefController::class, 'updateMerk'])->name('refmerk.update');
    Route::delete('merk/{merk}', [RefController::class, 'deleteMerk'])->name('refmerk.delete');
    // Types
    Route::get('type', [TypeController::class, 'index'])->name('type');
    Route::post('type', [TypeController::class, 'store'])->name('type.store');
    Route::put('type/{type}', [TypeController::class, 'update'])->name('type.update');
    Route::delete('type/{type}', [TypeController::class, 'delete'])->name('type.delete');
    // Items
    Route::get('item', [ItemController::class, 'index'])->name('item');
});

require __DIR__.'/auth.php';
