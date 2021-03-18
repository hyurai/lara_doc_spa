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
}