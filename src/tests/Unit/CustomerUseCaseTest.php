<?php

namespace Tests\Unit;

use App\Models\Customer;
use App\UseCases\RegisterCustomerUseCase;
use Tests\Fakes\CustomerRepositoryFake;
use Tests\TestCase;

class CustomerUseCaseTest extends TestCase
{

    public function test_create_customer_successfully()
    {
        $useCase = new RegisterCustomerUseCase(new CustomerRepositoryFake());
        $dataTest = [
            'name' => 'Fulano',
            'email' => 'fulano@email.com',
            'phone' => '6199999999',
            'password' => '123456',
            'document' => '11111111111',
            'birthday' => '2000-01-01',
        ];
        $customer = $useCase->execute($dataTest);
        $this->assertInstanceOf(Customer::class, $customer);
        $this->assertEquals("Fulano", $customer->name);
    }

    public function test_create_customer_with_empty_name()
    {
        $useCase = new RegisterCustomerUseCase(new CustomerRepositoryFake());
        $dataTest = [
            'name' => '',
            'email' => 'fulano@email.com',
            'phone' => '6199999999',
            'password' => '123456',
            'document' => '11111111111',
            'birthday' => '2000-01-01',
        ];
        $customer = $useCase->execute($dataTest);

        $this->assertNull($customer);
    }

    public function test_create_customer_with_empty_email()
    {
        $useCase = new RegisterCustomerUseCase(new CustomerRepositoryFake());
        $dataTest = [
            'name' => 'Fulano',
            'email' => '',
            'phone' => '6199999999',
            'password' => '123456',
            'document' => '11111111111',
            'birthday' => '2000-01-01',
        ];
        $customer = $useCase->execute($dataTest);

        $this->assertNull($customer);
    }

    public function test_create_customer_with_invalid_email()
    {
        $useCase = new RegisterCustomerUseCase(new CustomerRepositoryFake());
        $dataTest = [
            'name' => 'Fulano',
            'email' => 'fulano',
            'phone' => '6199999999',
            'password' => '123456',
            'document' => '11111111111',
            'birthday' => '2000-01-01',
        ];
        $customer = $useCase->execute($dataTest);

        $this->assertNull($customer);
    }
}
