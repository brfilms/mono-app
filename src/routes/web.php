<?php

use App\Http\Controllers\OperatorController;
use Illuminate\Support\Facades\Route;

Route::get('/operators', [OperatorController::class, "index"]);
Route::get('/operators/create', [OperatorController::class, "create"])->name('operators.create');
Route::post('/operators', [OperatorController::class, "store"])->name('operators');