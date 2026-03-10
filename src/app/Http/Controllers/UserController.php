<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\UseCases\RegisterCustomerUseCase;
use App\Http\Requests\StoreCustomerRequest;

class UserController
{
    public function store(StoreCustomerRequest $request, RegisterCustomerUseCase $registerUseCase)
{
    $registerUseCase->execute($request->validated());

    return redirect()->back()->with('success', 'Usuário cadastrado com sucesso!');
}
}