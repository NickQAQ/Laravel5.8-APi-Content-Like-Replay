<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Subsidiary extends Model
{
    protected $table = 'subsidiary_users';

    protected  $fillable = ['ip','user_id','user_head_portrait','updated_at'];

    protected  $hidden = ['created_at'];

    public static function UpdateUserData($url,$user_id,$ip)
    {
        $data = [
            'user_id' => $user_id,
            'user_head_portrait' => $url,
            'ip'    => $ip,
        ];
        $result = self::create($data);
        if ($result){
            return true;
        }
        return false;
    }

    //与用户表是一对一的关系
    public function user()
    {
        return $this->hasOne(User::class,'user_id','id');
    }
}
