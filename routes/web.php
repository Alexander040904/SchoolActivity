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

Route::get('/activate', [ActivateController::class, 'index'])->middleware(['auth', 'verified'])->name('activate');






Route::get('relaciones/uno_muchos', function(){
    $post = Role::find(1);
 


    $comment = User::find(1);
    $a = [$post->users,$comment->role];

   return $a;
 });

require __DIR__.'/auth.php';
