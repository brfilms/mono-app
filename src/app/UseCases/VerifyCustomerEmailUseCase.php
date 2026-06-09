<?php

namespace App\UseCases;

use App\Repository\Contracts\CustomerRepositoryInterface;
use Exception;

class VerifyCustomerEmailUseCase
{
    private CustomerRepositoryInterface $repository;

    public function __construct(CustomerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): void
    {
        $customer = $this->repository->findById($id);

        if (!$customer) {
            throw new Exception('Link de verificação inválido ou usuário não encontrado.');
        }

        if ($customer->email_verified_at !== null) {
            throw new Exception('Este e-mail já foi verificado anteriormente.');
        }

        $customer->email_verified_at = now();

        $success = $this->repository->saveUser($customer);

        if (!$success) {
            throw new Exception('Erro interno ao atualizar a verificação do cliente.');
        }
    }
}