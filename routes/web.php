<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\kategorieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


Route::get('/', [kategorieController::class, 'index']);
Route::post('dataInsert', [kategorieController::class, 'DataInsert']);

Route::get('/tabulka', [DataController::class, 'DataTableIndex']);


Route::delete('/kategorie/{id}', [DataController::class, 'destroy'])->name('kategorie.destroy');









Route::get('/index', [ProfileController::class, 'index']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


