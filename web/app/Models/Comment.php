<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function entertainer(){
        return $this->belongsTo('App\Model\Entertainer');
    }
    public function user(){
        return $this->belongsTo('App\Model\User');
    }
}