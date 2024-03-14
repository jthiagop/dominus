<?php

use App\Http\Controllers\MatrizController;
use App\Http\Controllers\OrganismoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::put('/organismo/{id}', [OrganismoController::class, 'update'])->name('organismo.update');
    Route::get('/organismo/{id}/edit', [OrganismoController::class, 'edit'])->name('organismo.edit');
    Route::get('/organismo/create', [OrganismoController::class, 'create'])->name('organismo.create');
    Route::post('/organismo', [OrganismoController::class, 'store' ])->name('organismo.store');
    Route::get('/organismo/listen', [OrganismoController::class, 'listen'])->name('organismo.listen');
    Route::get('/organismo/{id}', [OrganismoController::class, 'show'])->name('organismo.show');


    Route::get('/matriz/listen', [MatrizController::class, 'listen'])->name('matriz.listen');
    Route::get('matriz/create', [MatrizController::class, 'create'])->name('matriz.create');
    Route::get('matriz/{id}', [MatrizController::class, 'show'])->name('matriz.show');
    Route::post('matriz', [MatrizController::class, 'store'])->name('matriz.store');
    Route::get('/matriz', [MatrizController::class, 'index'])->name('matriz.index');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
