<?php

namespace App\UseCases;
Use App\Models\Customer;
use App\Repository\CustomerRepository;
use DateTime;

class RegisterCustomerUseCase
{
    private CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data): Customer
    {
        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->password = bcrypt($data['password']);
        $customer->document = $data['document'];
        $customer->birthday = new DateTime($data['birthday']);

        $this->repository->saveUser($customer);

        return $customer;
    }
}
