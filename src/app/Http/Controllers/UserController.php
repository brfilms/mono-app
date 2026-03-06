<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use App\UseCases\UserUseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController
{
    protected UserUseCase $userUseCase;

    public function __construct()
    {
        $this->userUseCase = new UserUseCase(new UserRepository());
    }

    public function createView(): View
    {
        return view('users.create');
    }

    public function create(Request $request): Redirect
    {
        dd("oi");
//        return Redirect::route('users.create');
    }
}
