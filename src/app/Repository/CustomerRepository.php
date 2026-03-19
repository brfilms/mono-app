<?php

namespace App\Repository;

use App\Models\Customer;
use App\Repository\Contracts\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function saveUser(Customer $customer): bool
    {
        return $customer->save();
    }

    public function findByDocument (string $document): ?Customer
    {
        return Customer::where('document', $document)->first();
    }
}
