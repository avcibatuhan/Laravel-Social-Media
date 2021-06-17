<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;
    protected $table = 'user_activities';

    
    public function getKatilimci()
    {
        return $this->hasOne('App\Models\User', 'id','user_id');
    }

}
