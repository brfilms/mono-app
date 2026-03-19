<?php

namespace App\Repository\Contracts;

use App\Models\Customer;

interface CustomerRepositoryInterface
{
    public function saveUser(Customer $customer): bool;
    public function findByDocument(string $document): ?Customer;
}
