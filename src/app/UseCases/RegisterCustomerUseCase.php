<?php

namespace App\UseCases;
Use App\Models\Customer;
use App\Repository\Contracts\CustomerRepositoryInterface;
use App\Repository\CustomerRepository;
use DateTime;
use PHPUnit\Framework\Exception;

class RegisterCustomerUseCase
{
    private CustomerRepositoryInterface $repository;

    public function __construct(CustomerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data): ?Customer
    {
        if (strlen($data['name']) === 0 ) {
            return null;
        }
        if (strlen($data['email']) === 0  || !(str_contains($data['email'], '@'))) {
            return null;
        }
        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->password = bcrypt($data['password']);
        $customer->document = $data['document'];
        $customer->birthday = new DateTime($data['birthday']);

        $success = $this->repository->saveUser($customer);
        if (!$success) {
            return null;
        }
        return $customer;
    }
}
