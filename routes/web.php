<?php

use App\Livewire\Employees\Index as EmployeesIndex;
use App\Livewire\Employees\Payment;
use App\Livewire\Pages\Index;
use App\Livewire\Payments\Index as PaymentsIndex;
use App\Livewire\Utangs\Index as UtangsIndex;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', Index::class)->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');
    Route::get('employees', EmployeesIndex::class)->name('employees.index');
    Route::get('employees/{id}/add-billings', Payment::class)->name('payments.show');
    Route::get('payments', PaymentsIndex::class)->name('payments.index');
    Route::get('utangs', UtangsIndex::class)->name('utangs.index');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
});

require __DIR__ . '/auth.php';
