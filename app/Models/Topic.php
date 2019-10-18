<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

     protected $fillable = ['user_id','title','content'];

     protected $hidden = ['created_at','updated_at'];

     //话题属于用户
     public function user(){
         return $this->belongsTo(User::class);
     }

    public function discussions()
    {
        return $this->hasMany(Discussions::class);
     }

}
