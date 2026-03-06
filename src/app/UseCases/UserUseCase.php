<?php

namespace App\UseCases;

use App\Repository\Contracts\UserRepositoryInterface;

class UserUseCase
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }
}
