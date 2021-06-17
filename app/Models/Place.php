<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    public function getComments()
    {
        return $this->hasMany('App\Models\PlaceComment','place_id');
    }
}
