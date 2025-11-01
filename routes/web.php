<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// ... (Rute publik dan rute 'auth' lainnya) ...
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


// === GRUP KHUSUS ADMIN ===
// Di sinilah letak Master User Anda
Route::middleware(['auth', 'role:admin'])->group(function () {

    // 2. TAMBAHKAN BARIS INI
    // Ini akan otomatis membuat rute:
    // GET /users -> users.index
    // GET /users/create -> users.create
    // POST /users -> users.store
    // GET /users/{user}/edit -> users.edit
    // PATCH /users/{user} -> users.update
    // DELETE /users/{user} -> users.destroy
    Route::resource('users', UserController::class);

});


require __DIR__.'/auth.php';
