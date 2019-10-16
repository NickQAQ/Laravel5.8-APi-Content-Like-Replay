<?php

namespace App;

use App\Models\Note;
use App\Models\Topice;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Mockery\Matcher\Not;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //用户使用手机号码进行登录
    public function findForPassport($mobile)
    {
        return $this->where('mobile',$mobile)->first();
    }

    //一个用户会有多个话题，用户和话题是一对多的关系
    public function topics()
    {
        return $this->hasMany(Topice::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    //判断话题修改操作是否为本人
    public function OwnTopic($topic)
    {
        return $this->id === $topic->user_id;
    }



}
