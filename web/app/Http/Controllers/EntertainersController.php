<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entertainer;
use App\Models\Comment;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class EntertainersController extends Controller

{
    public function index(){
        $entertainers = Entertainer::all();
        return view('Entertainers.index',compact('entertainers'));
    }
    public function create(Entertainer $entertainers){
        return view('Entertainers.create',compact('entertainers'));
    }
    public function store(){
    }
    public function show($id){
        $entertainer = Entertainer::findOrfail($id);
        $entertainer_id = $entertainer->id;
        $user_id = Auth::id();
        $comments = $entertainer->comments;
        $favorite = $entertainer->favorites->first();

        return view('Entertainers.show',compact('entertainer','comments','favorite'));
    }
}