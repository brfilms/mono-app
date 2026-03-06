<?php

use App\Http\Controllers\UserController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;
use Prometheus\Storage\InMemory;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/create', function () {
    return view('users.create-user-form');
});

Route::post('/users', function (Request $request) {
    $body = $request->post();
    $customer = new Customer();
    $customer->name = $body['name'];
    $customer->email = $body['email'];
    $customer->phone = $body['phone'];
    $customer->password = $body['password'];
    $customer->document = $body['document'];
    $customer->birthday = new DateTime($body['birthday']);

    $customer->save();
})->name('users');