<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Query\UnitController;
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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dependents');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/200ceb26807d6bf99fd6f4f0d1ca54d4', function () {
    return view('administrator');
})->middleware(['auth', 'verified'])->name('administrator');

Route::get('/2b22337f218b2d82dfc3b6f77e7cb8ec', function () {
    return view('superadministrator');
})->middleware(['auth', 'verified'])->name('superadministrator');

Route::get('/2b22337f218b2d82dfc3b6f77e7cb8ec', function () {
    return view('superadministrator');
})->middleware(['auth', 'verified'])->name('dependents.create');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(UnitController::class)->prefix('units')->group(function (){
        Route::get('', 'index')->name('auth.register');
    });
    
});

require __DIR__.'/auth.php';
