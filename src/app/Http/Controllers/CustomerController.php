<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Repository\CustomerRepository;
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

    public function index(Request $request)
    {
        $search = $request->input('search');

        $customers = Customer::query()
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('name', 'LIKE', "%{$search}%");

                    $searchClean = preg_replace('/\D/', '', $search);

                    if (!empty($searchClean)) {
                        $q->orWhere('document', 'LIKE', "%{$searchClean}%");
                    }
                });
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('customers.index', compact('customers'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('users.create-user-form', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $document = preg_replace('/\D/', '', $request->document);

        $exists = Customer::where('document', $document)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['document' => 'CPF já cadastrado'])->withInput();
        }

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->document = $document;
        $customer->birthday = $request->birthday;

        if ($request->filled('password')) {
            if ($request->password !== $request->password_confirmation) {
                return back()->withErrors(['password' => 'Senhas não conferem'])->withInput();
            }

            $customer->password = bcrypt($request->password);
        }

        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Excluído com sucesso!');
    }
}
