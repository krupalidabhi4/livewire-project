<?php

use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\ProjectCreate;
use App\Livewire\ProjectEdit;
use App\Livewire\ProjectListing;
use App\Livewire\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Redirect root to dashboard or login
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
});

// Guest-only routes
Route::middleware('guest')->group(function () {
    Route::get('/login',    Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

// Logout
Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('login');
})->name('logout')->middleware('auth');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard',          Dashboard::class)->name('dashboard');
    Route::get('/project-create',     ProjectCreate::class)->name('project.create');
    Route::get('/project-listing',    ProjectListing::class)->name('project.list');
    Route::get('/project-edit/{id}',  ProjectEdit::class)->name('project.edit');
});
