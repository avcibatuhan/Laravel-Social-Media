<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function getUser()
    {
        return $this->hasOne('App\Models\User', 'id','user');
    }
    public function getComments()
    {
        return $this->hasMany('App\Models\Comment','post');
    }
}
