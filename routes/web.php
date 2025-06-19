<?php

use App\Http\Controllers\DataController;
use App\Livewire\Afiliados\Afiliados;
use App\Livewire\Afiliados\CreateAfiliado;
use App\Livewire\Afiliados\EditAfiliado;
use App\Livewire\Cierres\Cierres;
use App\Livewire\Empresas\Empresas;
use App\Livewire\Gastos\CreateGastos;
use App\Livewire\Gastos\Gastos;
use App\Livewire\Gatos\Gastos as GatosGastos;
use App\Livewire\Pagos\CreatePagos;
use App\Livewire\Pagos\Pagos;
use App\Livewire\Planillas\CreatePlanillas;
use App\Livewire\Planillas\Planillas;
use App\Livewire\Roles\CreateRol;
use App\Livewire\Roles\EditRoles;
use App\Livewire\Roles\Roles;
use App\Livewire\Users\CreateUsers;
use App\Livewire\Users\EditUsers;
use App\Livewire\Users\Users;
use GuzzleHttp\Promise\Create;
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

    Route::get('Admin/Gastos', Gastos::class)->name('Admin.Gastos');
    Route::get('Admin/Gastos/Create', CreateGastos::class)->name('Admin.Gastos.Create');

    Route::get('Admin/Planillas', Planillas::class)->name('Admin.Planillas');
    Route::get('Admin/Planillas/Create', CreatePlanillas::class)->name('Admin.Planillas.Create');

    Route::get('Cierre/Cierres', Cierres::class)->name('Cierre.Cierres');


    //Data
    Route::get('data/ciudad', [DataController::class, 'autocomplete_city'])->name('data.ciudad');
});

require __DIR__.'/auth.php';
