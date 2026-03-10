<?php

namespace App\UseCases;
Use App\Models\Customer;
use DateTime;

class RegisterCustomerUseCase
{
    public function execute(array $data): Customer
    {
        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->password = bcrypt($data['password']);
        $customer->document = $data['document'];
        $customer->birthday = new DateTime($data['birthday']);

        $customer->save();

        return $customer;
    }
}
