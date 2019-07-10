<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => trim($request->email), 'password' => $request->password])){
            $user = Auth::user();
            dd($user);
        }
    }

    public function loginOut()
    {
        //loginOut
    }
}
