<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{
    public function show($id){
        $user = User::findOrfail($id);
        return view('Users.show',compact('user'));
    }  
}