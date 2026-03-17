<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    public function authorize(): bool
{
    return true;
}

public function rules(): array
{
    return [
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|max:255',
        'phone'    => 'required',
        'password' => 'required|min:6|confirmed',
        'document' => 'required|unique:customers,document',
        'birthday' => 'required|date|before:today',
    ];
}

public function messages(): array
{
    return [
        'password.confirmed' => 'As senhas digitadas não conferem.',
        'document.unique' => 'Este CPF já está cadastrado em nossa base.',
        'birthday.before' => 'A data de nascimento não pode ser no futuro.',
        'email.email'     => 'Por favor, insira um endereço de e-mail válido.',
    ];
}
}
