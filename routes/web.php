<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\kategorieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StrankaController;
use App\Http\Controllers\DiskuseController;
use App\Http\Controllers\PrihlaseniController;


Route::get('/', [kategorieController::class, 'index'])->name('index')->middleware('auth');;
Route::post('dataInsert', [kategorieController::class, 'DataInsert']);

Route::get('/index', [ProfileController::class, 'index'])->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/kategorie', [DataController::class, 'DataTableIndex'])->name('kategorie');


Route::delete('/kategorie/{id}', [DataController::class, 'destroy'])->name('kategorie.destroy');
Route::put('/kategorie/update/{id}', [DataController::class, 'update']);

Route::get('/stranka/{id}', [StrankaController::class, 'show']);
Route::get('/diskuse/{id}', [DiskuseController::class, 'show'])->name('diskuse');


// Add a new route to the web.php file
Route::get('obrazek/{id}', 'App\Http\Controllers\ObrazekController@showImage');

Route::get('/kategorie-stranek', [StrankaController::class, 'showCategories'])->name('kategorie-stranek');
Route::post('/kategorie-stranek', [StrankaController::class, 'filterByCategory']);


Route::get('/index', [ProfileController::class, 'index']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/prihlaseni', [PrihlaseniController::class, 'show'])->name('prihlaseni');
Route::post('/prihlaseni', [PrihlaseniController::class, 'loginPost'])->name('prihlaseni.post');

Route::get('/registrace', [RegisterController::class, 'create']);
Route::post('/registrace', [RegisterController::class, 'store']);

Route::get('logout', function () {
    Auth::logout();
    return redirect('prihlaseni');
})->name('logout');
require __DIR__.'/auth.php';


