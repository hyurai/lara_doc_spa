<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Entertainer;

class FavoritesController extends Controller
{
    public function store(Request $request,Entertainer $entertainer,Favorite $favorite){
        $favorite->entertainer_id = $request->entertainer_id;
        $favorite->user_id = $request->user_id;
        $favorite->save();
        return back();
    }
    public function delete(Request $request,$id){
        $entertainer = Entertainer::findOrfail($request->id);
        $user = Auth::user()->id;
        return back();

    }
}
