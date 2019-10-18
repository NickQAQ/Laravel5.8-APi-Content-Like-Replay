<?php

namespace App;

use App\Models\Discussions;
use App\Models\Like;
use App\Models\Note;
use App\Models\Topic;
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
        return $this->hasMany(Topic::class);
    }

    //用户与笔记表的关系为一对多 笔记属于用户
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    //判断话题修改操作是否为本人
    public function ownsTopic($topic)
    {
        //我无法获得topic表中的user_id 如果让前端传递那么久不够优雅了 我应该如何获得附属表中的用户id
        return auth('api')->user()->id === $topic->user;
    }

    public function discussions()
    {
        return $this->hasMany(Discussions::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }



}
