<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceComment extends Model
{
    use HasFactory;
    protected $table = 'place_comments';
    public function getUser()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
