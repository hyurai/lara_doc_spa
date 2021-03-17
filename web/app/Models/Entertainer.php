<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entertainer extends Model
{
    use HasFactory;
    public function comments()
    {
        return $this->hasmany('App\Models\Comment');
    }
    public  function favorites()
    {
        return $this->hasmany('App\Models\Favorite');
    }
}