<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PackageController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [AuthController::class,'showSignUp'])-> name('signUp');
Route::post('/signedup', [AuthController::class,'signUp'])-> name('signedUp');
Route::get('/signedup', function () {
    return redirect()->route('signUp')->with('error', 'Silakan daftar melalui form.');
});

Route::get('/login', [AuthController::class,'showLogin'])-> name('showLogin');
Route::post('/logedIn', [AuthController::class,'logIn'])-> name('logedIn');
Route::get('/logedIn', function () {
    return redirect()->route('showLogin')->with('error', 'Silakan login melalui form.');
});

Route::middleware('auth')->group(function () {
    // User
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/home', [PageController::class, 'home'])->name('home');
    // Route::get('/tabunganku', [PageController::class, 'tabunganku'])->name('tabunganku');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update_password');

    // packages
    Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
    Route::get('/packages/{id}', [PackageController::class, 'show'])->name('packages.show');
    
    // tabunganku
    Route::get('/tabunganku', [PageController::class, 'tabunganku'])->name('tabunganku');
    Route::put('/tabungan/{id}', [PageController::class, 'updateTabungan'])->name('tabungan.update');
    Route::post('/tabungan/{id}/payment', [PageController::class, 'makePayment'])->name('tabungan.payment');
    Route::post('/savings', [PackageController::class, 'storeSaving'])->name('savings.store');
    // Di web.php
    Route::post('/tabungan/{saving}/payment', [TabunganController::class, 'makePayment'])->name('tabungan.payment');


    // Admin
    Route::get('/dashboard/statistik', [PageController::class, 'dashboard'])->name('dashboard');
});

Route::get('/savings', function () {
    return redirect()->route('tabunganku');
});
Route::get('/logout', function () {
    return redirect('/login');
});

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/packages', [PackageController::class, 'adminIndex'])->name('admin.packages.index');
    Route::get('/packages/create', [PackageController::class, 'create'])->name('admin.packages.create');
    Route::post('/packages', [PackageController::class, 'store'])->name('admin.packages.store');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


Route::get('/detailpackage', function () {
    return view('detailpackage');
})->name('detailpackage');

Route::get('/dashboard/tambah-admin', function () {
    return view('dashboard.tambah-admin');
});

Route::get('/dashboard/statistik', function () {
    return view('dashboard.statistik');
});
Route::get('/dashboard/data-user', function () {
    return view('dashboard.data-user');
});

// Route::get('/dashboard/packages', function () {
//     return view('dashboard.packages');
// });

Route::get('/dashboard/progres-order', function () {
    return view('dashboard.progres-order');
});

Route::get('/profile/status', function () {
    return view('profile.status');
});

Route::get('/profile/notification', function () {
    return view('profile.notification');
});

Route::get('/profile/password', function () {
    return view('profile.password');
});

Route::get('/profile/history', function () {
    return view('profile.history');
});