<?php

namespace App\Repository;

use App\Models\Customer;
use App\Repository\Contracts\CustomerRepositoryInterface;
use Override;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function saveUser(Customer $customer): bool
    {
        return $customer->save();
    }

    public function findByDocument(string $document): ?Customer
    {
        $document = preg_replace('/\D/', '', $document);

        return Customer::where('document', $document)->first();
    }

    public function findById(int $id): ?Customer
    {
        return Customer::find($id);
    }
}