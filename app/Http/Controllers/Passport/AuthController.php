<?php

namespace App\Http\Controllers\Passport;

use App\Http\Requests\AuthUserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    private $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function sign(AuthUserRequest $request)
    {
        if (!$request->validated()){
            return $request->messages();
        }
        $result = $this->user->save([
            'name'      => $request->name,
            'password'  => $request->password,
            'email'     => $request->email,
            'mobile'    => bcrypt($request->mobile)
        ]);
        if ($result) {
            return response()->json(['message'=>'注册成功'],201);
        }
        return response()->json(['message'=>'注册失败（入库失败）',400]);

    }

    public function login(Request $request)
    {
        
    }

    public function loginOut(Request $request)
    {
        
    }
}
