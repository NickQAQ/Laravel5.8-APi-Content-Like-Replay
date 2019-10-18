<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'like';

    protected $hidden = ['user_id','like_id','like_type'];

    protected $fillable = ['created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likeable()
    {
        return $this->morphTo(Discussions::class);
    }
}
