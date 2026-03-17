<?php

namespace App\Http\Controllers;
use App\Repository\CustomerRepository;
use App\Repository\CustomerRepositoryMongo;
use Illuminate\Http\Request;
use App\UseCases\RegisterCustomerUseCase;
use App\Http\Requests\StoreCustomerRequest;

class CustomerController
{
    public function store(StoreCustomerRequest $request)
    {
        $registerUseCase = new RegisterCustomerUseCase(new CustomerRepository());
        $registerUseCase->execute($request->validated());
        return redirect()->back()->with('success', 'Usuário cadastrado com sucesso!');
    }
}
