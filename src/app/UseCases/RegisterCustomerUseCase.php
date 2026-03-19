<?php

namespace App\UseCases;

use App\Models\Customer;
use App\Repository\Contracts\CustomerRepositoryInterface;
use DateTime;
use Exception;
use InvalidArgumentException;

class RegisterCustomerUseCase
{
    private CustomerRepositoryInterface $repository;

    public function __construct(CustomerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data): Customer
    {
        if (empty($data['name']) || strlen($data['name']) > 255) {
            throw new InvalidArgumentException('O nome é obrigatório e deve ter no máximo 255 caracteres.');
        }
        if (empty($data['phone'])) {
            throw new InvalidArgumentException('O telefone é obrigatório.');
        }
        
        if (empty($data['document'])) {
            throw new InvalidArgumentException('O documento é obrigatório.');
        }

        $existingCustomer = $this->repository->findByDocument($data['document']);
        if ($existingCustomer !== null) {
            throw new InvalidArgumentException('Este CPF já está cadastrado em nossa base.');
        }

        if (empty($data['email']) || strlen($data['email']) > 255 || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Por favor, insira um endereço de e-mail válido.');
        }


        if (empty($data['password']) || strlen($data['password']) < 6) {
            throw new InvalidArgumentException('A senha é obrigatória e deve ter no mínimo 6 caracteres.');
        }

        if (!isset($data['password_confirmation']) || $data['password'] !== $data['password_confirmation']) {
            throw new InvalidArgumentException('As senhas digitadas não conferem.');
        }

        if (empty($data['birthday'])) {
            throw new InvalidArgumentException('A data de nascimento é obrigatória.');
        }

        try {
            $birthday = new DateTime($data['birthday']);
            $today = new DateTime('today');

            if ($birthday >= $today) {
                throw new InvalidArgumentException('A data de nascimento não pode ser no futuro.');
            }
        } catch (Exception $e) {
            if ($e instanceof InvalidArgumentException) throw $e;
            throw new InvalidArgumentException('Data de nascimento inválida.');
        }

        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->password = bcrypt($data['password']);
        $customer->document = $data['document'];
        
        $customer->birthday = $birthday->format('Y-m-d'); 

        $success = $this->repository->saveUser($customer);
        
        if (!$success) {
            throw new Exception('Ocorreu um erro interno ao salvar o cliente no banco.');
        }

        return $customer;
    }
}