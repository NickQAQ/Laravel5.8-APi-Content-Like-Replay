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


      //使用Guzzle 自己获取用户的Access_token
         $response = $this->client->post('http://conding.test/oauth/token', [
              'form_params' => [
                  'grant_type'      => 'password',
                  'client_id'       => env('PASSPROT_CLIENTID'),
                  'client_secret'   => env('PASSPROT_SECRET'),
                  'username'        => $result->name,
                  'password'        => $result->password,      //$request->password
                  'scope'           => '*'
              ]
          ]);
          $token = json_decode((string) $response->getBody(),true);
          return response()->json([
              'token'    => $token,
              'username' => $result->name,
              'msg'      => '注册成功'
          ],201);
//          return response()->json([
//              'msg' => '用户创建成功',
//              'access_token' => $result->createToken('my token')->accessToken,
//              'username' => $result->name
//          ],201);
    }

}
