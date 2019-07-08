<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        dd($request->all());
        $data = [
            'username' => $request->username,
            'password' => $request->password,
            'email'    => $request->email
        ];
       return response()->json([
           'data' => $data
       ],201);
    }
}
