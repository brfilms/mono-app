<?php

namespace Tests\Fakes;

use App\Models\Customer;
use App\Repository\Contracts\CustomerRepositoryInterface;

class CustomerRepositoryFake implements CustomerRepositoryInterface
{

    public function saveUser(Customer $customer): bool
    {
        return true;
    }
}
