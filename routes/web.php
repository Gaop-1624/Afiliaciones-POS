<?php

use App\Http\Controllers\DataController;
use App\Livewire\Afiliados\Afiliados;
use App\Livewire\Afiliados\CreateAfiliado;
use App\Livewire\Afiliados\EditAfiliado;
use App\Livewire\Empresas\Empresas;
use App\Livewire\Pagos\CreatePagos;
use App\Livewire\Pagos\Pagos;
use App\Livewire\Roles\CreateRol;
use App\Livewire\Roles\EditRoles;
use App\Livewire\Roles\Roles;
use App\Livewire\Users\CreateUsers;
use App\Livewire\Users\EditUsers;
use App\Livewire\Users\Users;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('Empresas/Configurar', Empresas::class)->name('Empresas.Configurar');
    Route::get('Admin/Users', Users::class)->name('Admin.Users');
    Route::get('Admin/User/Create', CreateUsers::class)->name('Admin.User.Create');
    Route::get('Admin/User/Edit/{userid}', EditUsers::class, 'edit')->name('Admin.User.Edit');

    Route::get('Admin/Roles', Roles::class)->name('Admin.Roles');
    Route::get('Admin/Roles/Create', CreateRol::class)->name('Admin.Roles.Create');
    Route::get('Admin/Roles/Edit/{roleid}', EditRoles::class, 'edit')->name('Admin.Roles.Edit');

    Route::get('Afiliaciones/Afiliados', Afiliados::class)->name('Afiliaciones.Afiliados');
    Route::get('Afiliaciones/Afiliados/Create', CreateAfiliado::class)->name('Afiliaciones.Afiliados.Create');
    Route::get('Afiliaciones/Afiliados/Edit/{afiliadoid}', EditAfiliado::class, 'edit')->name('Afiliaciones.Afiliados.Edit');

    Route::get('Pagos/Pagos', Pagos::class)->name('Pagos.Pagos');
    Route::get('Pagos/Pagos/Create', CreatePagos::class)->name('Pagos.Pagos.Create');

    //Data
    Route::get('data/ciudad', [DataController::class, 'autocomplete_city'])->name('data.ciudad');
});

require __DIR__.'/auth.php';
