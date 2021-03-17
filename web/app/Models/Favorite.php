<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    public function Users(){
        return $this->belongsTo('App\Models\User');
    }
    public function Entertainers(){
       return $this->belongsTo('App\Models\Entertainer');
    }
    public function scopeEntertainer_idEqual($query,$entertainer_id)
    {
        return $query->where('entertainer_id' == $entertainer_id);
    }
    public function scopeUser_idEqual($query,$user_id)
    {
        return $query->where('user_id' == $user_id);
    }
}