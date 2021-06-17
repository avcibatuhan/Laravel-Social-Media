<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'activities';
    public function getUser()
    {
        return $this->hasMany('App\Models\UserActivity','activity_id');
    }

    public function getCreator()
    {
        return $this->hasOne('App\Models\User', 'id','user_id');
    }




}
