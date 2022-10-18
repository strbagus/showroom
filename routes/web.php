<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RefController;
use App\Http\Controllers\ItemController;

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
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('ref', [RefController::class, 'index'])->name('ref');
    Route::post('refmerk/create', [RefController::class, 'createMerk'])->name('refmerk.create');
    Route::get('refmerk/{refmerk}/edit', [RefController::class, 'editMerk'])->name('refmerk.edit');
    Route::put('refmerk/{refmerk}', [RefController::class, 'updateMerk'])->name('refmerk.update');
    Route::delete('refmerk/{refmerk}', [RefController::class, 'deleteMerk'])->name('refmerk.delete');
    Route::post('reftype/create', [RefController::class, 'createMerk'])->name('reftype.create');
    Route::get('reftype/{reftype}/edit', [RefController::class, 'editMerk'])->name('reftype.edit');
    Route::put('reftype/{reftype}', [RefController::class, 'updateMerk'])->name('reftype.update');
    Route::delete('reftype/{reftype}', [RefController::class, 'deleteMerk'])->name('reftype.delete');
    Route::get('item', [ItemController::class, 'index'])->name('item');
});

require __DIR__.'/auth.php';
