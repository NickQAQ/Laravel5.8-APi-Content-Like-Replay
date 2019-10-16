<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Subsidiary;
use App\User;
use GuzzleHttp\Client as Guzzle;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private $client;

    public function __construct(Guzzle $http)
    {
        $this->client = $http;
    }

    public function register(RegisterUserRequest $request)
    {
      $result =  User::create([

               'name'     => trim($request->name),
               'password' => bcrypt($request->password),
               'email'    => $request->email,
               'mobile'   => $request->mobile,

           ]);
      //更新附属表数据
      $ip = $request->getClientIp();
      Subsidiary::UpdateUserData($request->url,$result->id,$ip);


      //使用Guzzle 自己获取用户的Access_token  在User Model 中复写findForPassport function 从而使用mobile作为登录账号
         $response = $this->client->post('www.reply.test/oauth/token', [
              'form_params' => [
                  'grant_type'      => 'password',
                  'client_id'       => env('PASSPORT_CLIENT_ID'),
                  'client_secret'   => env('PASSPORT_SECRET'),
                  'username'        => $request->mobile,
                  'password'        => $request->password,      //$request->password
                  'scope'           => '*'
              ]
          ]);
          $token = json_decode((string) $response->getBody(),true);
          return response()->json([
              'token'    => $token,
              'username' => $result->name,
              'msg'      => '注册成功'
          ],201);
          //另外一种形式 直接使用它自带的function createToken
//          return response()->json([
//              'msg' => '用户创建成功',
//              'access_token' => $result->createToken('my token')->accessToken,
//              'username' => $result->name
//          ],201);
    }

    public function test(Request $request)
    {
        $this->middleware('auth:api');
        dd($request->user());
    }

}
