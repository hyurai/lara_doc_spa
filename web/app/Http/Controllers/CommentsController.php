<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(Comment $comment,Request $request){
        $comment->user_id = $request->user_id;
        $comment->entertainer_id = $request->entertainer_id;
        $comment->text = $request->text;
        $comment->save();
        return back();
     }   
}