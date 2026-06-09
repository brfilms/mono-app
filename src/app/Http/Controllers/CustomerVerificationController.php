<?php

namespace App\Http\Controllers;

use App\UseCases\VerifyCustomerEmailUseCase;
use Illuminate\Http\Request;
use Exception;

class CustomerVerificationController
{
    private VerifyCustomerEmailUseCase $useCase;

    public function __construct(VerifyCustomerEmailUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function verify(Request $request, $id)
    {
        try {
            $this->useCase->execute((int) $id);

            return redirect()->route('customers.index')->with('success', 'E-mail confirmado com sucesso! Sua conta está ativa.');

        } catch (Exception $e) {
            return redirect()->route('customers.index')->withErrors(['error' => $e->getMessage()]);
        }
    }
}