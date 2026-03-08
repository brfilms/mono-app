<?php

use App\Http\Controllers\UserController;
use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;
use Prometheus\Storage\InMemory;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/operators', function () {
    $operatorList = Operator::all();
    return view("operators.dashboard", ["operatorList"=>$operatorList]);
});

Route::get('/operators/create', function () {
    return view("operators.create_operator");
})->name('operators.create');

Route::post('/operators', function(Request $request) {
    $body = $request->post();
    $operator = new Operator();
    $operator->name = $body['name'];
    $operator->document = $body['document'];
    $operator->birthdate = $body['birthdate'];
    $operator->registration = $body['registration'];
    $operator->phone = $body['phone'];
    $operator->address = $body['address'];
    $operator->sector = $body['sector'];
    $operator->email = $body['email'];
    $operator->password = $body['password'];
    $operator->save();

    return redirect('/operators');
})->name('operators');

