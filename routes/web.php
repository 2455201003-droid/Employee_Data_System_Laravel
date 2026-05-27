<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function() {
    Route::get('/employes/pdf', [EmployeController::class, 'exportPdf']);

    Route::get('/employes', [EmployeController::class, 'index']);

    Route::get('/employes/Add', [EmployeController::class, 'create']);

    Route::post('/employes', [EmployeController::class, 'store']);

    Route::get('/employes/{id}/edit', [EmployeController::class, 'edit']);

    Route::put('/employes/{id}', [EmployeController::class, 'update']);

    Route::delete('/employes/{id}', [EmployeController::class, 'destroy']);
});

require __DIR__.'/auth.php';
