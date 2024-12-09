<?php

use App\Http\Controllers\ActivateController;
use App\Http\Controllers\ProfileController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/Activacion/{activate}', [ActivateController::class, 'index'])->middleware(['auth', 'verified'])->name('Activacion');
Route::get('/Desactivar/{deactivate}', [ActivateController::class, 'index'])->middleware(['auth', 'verified'])->name('Desactivar');






Route::get('relaciones/uno_muchos', function(){
    $rol = Role::find(1);
    $activeUsers = $rol->users()
        ->where('is_active', 2)
        ->get(['role_id', 'name']);

    return $activeUsers;
 });

require __DIR__.'/auth.php';
