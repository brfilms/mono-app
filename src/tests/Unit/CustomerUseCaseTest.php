<?php

namespace Tests\Unit;

use App\Models\Customer;
use App\UseCases\RegisterCustomerUseCase;
use App\Repository\Contracts\CustomerRepositoryInterface;
use App\Mail\CustomerEmailVerification;
use Illuminate\Support\Facades\Mail;
use InvalidArgumentException;
use Tests\TestCase;

class CustomerUseCaseTest extends TestCase
{
    private function getValidData(): array
    {
        return [
            'name'                  => 'Diego Martins',
            'email'                 => 'diego@email.com',
            'phone'                 => '(61) 98336-2270',
            'password'              => '123456',
            'password_confirmation' => '123456',
            'document'              => '074.512.621-97',
            'birthday'              => '1990-01-01',
        ];
    }

    public function test_create_customer_successfully_and_formats_attributes()
    {
        Mail::fake();

        $repositoryMock = $this->createMock(CustomerRepositoryInterface::class);
        $repositoryMock->method('findByDocument')->willReturn(null);
        
        $repositoryMock->method('saveUser')->willReturnCallback(function (Customer $customer) {
            $customer->id = 1;
            return true;
        });

        $useCase = new RegisterCustomerUseCase($repositoryMock);

        $customer = $useCase->execute($this->getValidData());

        $this->assertInstanceOf(Customer::class, $customer);
        
        $this->assertEquals("074.512.621-97", $customer->document);
        $this->assertEquals("(61) 98336-2270", $customer->phone);
        
        $this->assertTrue(strlen($customer->password) >= 60);

        Mail::assertSent(CustomerEmailVerification::class, function ($mail) use ($customer) {
            return $mail->hasTo($customer->email);
        });
    }

    public function test_throws_exception_if_name_is_empty()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('O nome é obrigatório');

        $repositoryMock = $this->createMock(CustomerRepositoryInterface::class);
        $useCase = new RegisterCustomerUseCase($repositoryMock);
        
        $data = $this->getValidData();
        $data['name'] = '';

        $useCase->execute($data);
    }

    public function test_throws_exception_if_email_is_invalid()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('endereço de e-mail válido');

        $repositoryMock = $this->createMock(CustomerRepositoryInterface::class);
        $useCase = new RegisterCustomerUseCase($repositoryMock);
        
        $data = $this->getValidData();
        $data['email'] = 'email_errado.com';

        $useCase->execute($data);
    }

    public function test_throws_exception_if_passwords_do_not_match()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('As senhas digitadas não conferem');

        $repositoryMock = $this->createMock(CustomerRepositoryInterface::class);
        $useCase = new RegisterCustomerUseCase($repositoryMock);
        
        $data = $this->getValidData();
        $data['password_confirmation'] = 'senha_diferente';

        $useCase->execute($data);
    }

    public function test_throws_exception_if_document_already_exists()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Este CPF já está cadastrado');

        $repositoryMock = $this->createMock(CustomerRepositoryInterface::class);
        $repositoryMock->method('findByDocument')->willReturn(new Customer());
        $useCase = new RegisterCustomerUseCase($repositoryMock);
        
        $useCase->execute($this->getValidData());
    }

    public function test_throws_exception_if_birthday_is_in_the_future()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('não pode ser no futuro');

        $repositoryMock = $this->createMock(CustomerRepositoryInterface::class);
        $useCase = new RegisterCustomerUseCase($repositoryMock);
        
        $data = $this->getValidData();
        $data['birthday'] = '2099-12-31';

        $useCase->execute($data);
    }
}