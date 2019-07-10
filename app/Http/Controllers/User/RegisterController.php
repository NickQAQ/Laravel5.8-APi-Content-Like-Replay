<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\User;
use GuzzleHttp\Client as Guzzle;

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
               'email'    => $request->email

           ]);


      //我这边使用了guzzle方式做了模拟请求，但是对网速要求有点高，这边你们可以自己尝试一下。PS:我guzzle请求了三次三次time out
//         $response = $this->client->post('http://conding.test/oauth/token', [
//              'form_params' => [
//                  'grant_type'      => 'password',
//                  'client_id'       => '2',
//                  'client_secret'   => 'qt7nVw7larNBv9jbLQuLGInrWrGLP4BGSBQh6nSo',
//                  'username'        => $result->email,
//                  'password'        => $result->password,      //$request->password
//                  'scope'           => '*'
//              ]
//          ]);
//          $token = json_decode((string) $response->getBody(),true);
//          return response()->json([
//              'token'    => $token,
//              'username' => $result->name,
//              'msg'      => '注册成功'
//          ],201);
          return response()->json([
              'msg' => '用户创建成功',
              'access_token' => $result->createToken('my token')->accessToken,
              'username' => $result->name
          ],201);
    }
}
