<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Discussions extends Model
{
    protected $fillable = ['user_id','topic_id','content'];

    protected $hidden = ['created_at','updated_at'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }
}
