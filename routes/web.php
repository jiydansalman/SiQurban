<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [AuthController::class,'showSignUp'])-> name('signUp');
Route::post('/signedup', [AuthController::class,'signUp'])-> name('signedUp');

Route::get('/login', [AuthController::class,'showLogin'])-> name('showLogin');
Route::post('/logedIn', [AuthController::class,'logIn'])-> name('logedIn');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update_password');


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/packages', function () {
    return view('packages');
})->name('packages');
Route::get('/tabunganku', function () {
    return view('tabunganku');
})->name('tabunganku');
Route::get('/detailpackage', function () {
    return view('detailpackage');
})->name('detailpackage');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/dashboard/tambah-admin', function () {
    return view('dashboard.tambah-admin');
});

Route::get('/dashboard/statistik', function () {
    return view('dashboard.statistik');
});
Route::get('/dashboard/data-user', function () {
    return view('dashboard.data-user');
});

Route::get('/dashboard/tambah-produk', function () {
    return view('dashboard.tambah-produk');
});

Route::get('/dashboard/progres-order', function () {
    return view('dashboard.progres-order');
});

Route::get('/profile/edit-profile', function () {
    return view('profile.edit-profile');
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