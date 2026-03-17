<?php

namespace App\Repository;

use App\Models\Customer;

class CustomerRepository 
{
    public function saveUser(Customer $customer): void 
    {
        $customer->save();
    }
}