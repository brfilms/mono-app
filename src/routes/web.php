<?php

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;
use Prometheus\Storage\InMemory;
use App\Http\Controllers\CustomerVerificationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/create', function () {
    return view('users.create-user-form');
});

Route::post('/clientes', [CustomerController::class, 'store'])->name('customers.store');

Route::get('/clientes', [CustomerController::class, 'index'])->name('customers.index');

Route::get('/clientes/{id}/editar', [CustomerController::class, 'edit'])->name('customers.edit');

Route::put('/clientes/{id}', [CustomerController::class, 'update'])->name('customers.update');

Route::delete('/clientes/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::get('/clientes/verificar-email/{id}', [CustomerVerificationController::class, 'verify'])
    ->name('customers.verify_email')
    ->middleware('signed');