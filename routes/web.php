<?php

use App\Http\Kernel;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Query\UnitController;
use App\Http\Controllers\Query\DependentController;
use App\Http\Controllers\Query\AccessController;
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

Route::get('/', [AccessController::class, 'index'])
->name('login');

Route::get('/200ceb26807d6bf99fd6f4f0d1ca54d4', function () {
    return view('administrator');
})->middleware(['auth', 'verified'])->name('administrator');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';