<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topice extends Model
{
    protected $table = 'topices';

     protected $fillable = ['user_id','title','content'];

     protected $hidden = ['created_at','updated_at'];
}
