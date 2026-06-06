<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ProfileController;
use App\Models\Evento;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'home'])->name('home');
Route::get('/quem-somos', [AppController::class, 'quem_somos'])->name('quem-somos');
Route::get('/contato', [AppController::class, 'contato'])->name('contato');
Route::get('/eventos', [AppController::class, 'eventos'])->name('eventos');

Route::get('/dashboard', function () {
    return view('dashboard', ['eventos' => Evento::all()]);
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/eventos/create', [AppController::class, 'createEvento'])->name('eventos_create');
    Route::post('/eventos/store', [AppController::class, 'storeEvento'])->name('eventos_store');
    Route::get('/eventos/{id}/edit', [AppController::class, 'editEvento'])->name('eventos_edit');
    Route::put('/eventos/{id}/update', [AppController::class, 'updateEvento'])->name('eventos_update');
    Route::delete('/eventos/{id}/destroy', [AppController::class, 'destroyEvento'])->name('eventos_destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
