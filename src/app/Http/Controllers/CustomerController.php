<?php

namespace App\Http\Controllers;

use App\Repository\CustomerRepository;
use Illuminate\Http\Request;
use App\UseCases\RegisterCustomerUseCase;
use InvalidArgumentException;
use Illuminate\Support\Facades\Log;

class CustomerController
{
    public function store(Request $request)
    {

        $registerUseCase = new RegisterCustomerUseCase(new CustomerRepository());

        try {
            $registerUseCase->execute($request->all());

            return redirect()->back()->with('success', 'Usuário cadastrado com sucesso!');
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            $key = 'error';

            if (str_contains($message, 'nome')) $key = 'name';
            elseif (str_contains($message, 'e-mail')) $key = 'email';
            elseif (str_contains($message, 'senha')) $key = 'password';
            elseif (str_contains($message, 'telefone')) $key = 'phone';
            elseif (str_contains($message, 'CPF') || str_contains($message, 'documento')) $key = 'document';
            elseif (str_contains($message, 'nascimento')) $key = 'birthday';

            return redirect()->back()->withErrors([$key => $message])->withInput();
        } catch (\Exception $e) {
            Log::error("Erro no cadastro de cliente: " . $e->getMessage());

            return redirect()->back()
                ->withErrors(['error' => 'Ocorreu um erro inesperado. Por favor, tente novamente.'])
                ->withInput();
        }

    }
    public function index()
    {
        $customers = \App\Models\Customer::orderBy('id', 'desc')->get();

        return view('customers.index', compact('customers'));
    }
}
