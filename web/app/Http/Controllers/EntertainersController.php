<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entertainer;
use App\Models\Comment;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Weidner\Goutte\GoutteFacade as GoutteFacade;


class EntertainersController extends Controller

{
    public function index(){
        $entertainers = Entertainer::all();
        return view('Entertainers.index',compact('entertainers'));
    }
    public function create(Entertainer $entertainers){
        return view('Entertainers.create',compact('entertainers'));
    }
    public function store(Request $request,Entertainer $entertainer){
        $name = $request->name;

        $goutte = GoutteFacade::request('GET', "https://talent-dictionary.com/{{$name}}");
        $filter = $goutte->filter('.container')->filter('container_inner')->filter('main')->filter('article')->filter('article_header');
        $entertainer->image_url = array();
        $entertainer->name = array();
        $entertainer->age = array();
        $entertainer->image_url = $filter->filter('main_img')->filter('img')->attr('src');
        $entertainer->name = $filter->filter('header_info')->filter('talent_name_wrapper')->filter('h1')->text();
        $entertainer->age = $filter->filter('header_info')->filter('talent_name_wrapper')->filter('a')->text()->str_replace('歳');
        $entertainer->save();
        
        return view('Entertainer.store',compact('entertainer'));
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