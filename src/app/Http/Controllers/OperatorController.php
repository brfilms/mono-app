<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController 
{
    public function index ()
    {
        $operatorList = Operator::all();
        return view("operators.dashboard", ["operatorList"=>$operatorList]);
    }

    public function create ()
    {
        return view("operators.create_operator");
    }

    public function store (Request $request)
    {
        $body = $request->post();
        $operator = new Operator();
        $operator->name = $body['name'];
        $operator->document = $body['document'];
        $operator->birthdate = $body['birthdate'];
        $operator->registration = $body['registration'];
        $operator->phone = $body['phone'];
        $operator->address = $body['address'];
        $operator->sector = $body['sector'];
        $operator->email = $body['email'];
        $operator->password = $body['password'];
        $operator->save();

        return redirect('/operators');
    }
}