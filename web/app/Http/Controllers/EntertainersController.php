<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entertainer;
use App\Models\Comment;
use App\Models\Favorite;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Weidner\Goutte\GoutteFacade as GoutteFacade;
use Illuminate\Support\Collection;
use Validator;
class EntertainersController extends Controller

{
    public function index(){
        $entertainers = Entertainer::all();
        return view('Entertainers.index',compact('entertainers'));
    }
    public function create(Request $request,Entertainer $entertainer){
        return view('Entertainers.create',compact('entertainer'));
    }
    public function store(Request $request){
        $URL = "https://talent-dictionary.com/{$request->name}";
        $goutte = GoutteFacade::request('GET', $URL);
        $a = $goutte->filter('.container');
        $b = $a->filter('.main');
        try{
           $name['name'] = $b->filter('h1')->text();
        }catch(Exception $e){
            return redirect("/entertainer");
        }
        $name['name'] = $b->filter('h1')->text();
        if($name['name'] == "ページが見つかりませんでした"){
            $entertainer = new Entertainer;
        }else{
            $entertainers = Entertainer::firstOrNew(['name' => $name['name']]);
            if($entertainers->wasResentlyCreated == false){
                $entertainer = Entertainer::where('name','=',$name['name'])->get();
                if($entertainer->isEmpty()){
                    try{
                        $b->filter('img')->attr('src');
                    }catch(Exception $e){
                        $entertainer = new Entertainer;
                        $image_url = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSy8ql_lmIVHKaS_9jR_8FvwjO1Eyr0ruOd7A&usqp=CAU";
                        $entertainer->image_url = $image_url;
                        $classage = $b->filter('.age')->text();
                        $age = rtrim($classage,'歳');
                        $entertainer->name = $name['name'];
                        $entertainer->age = $age;
                        $entertainer->save();
                        $entertainers = Entertainer::where('name',$request->name)->firstOrFail();
                        return view('Entertainers.store',compact('entertainer'));
                    }
                    $image_url = $b->filter('img')->attr('src');
                    $classage = $b->filter('.age')->text();
                    $age = rtrim($classage,'歳');
                    $entertainers->name = $name['name'];
                    $entertainers->image_url = $image_url;
                    $entertainers->age = $age;
                    $entertainers->save();
                    $entertainer = Entertainer::where('name',$request->name)->firstOrFail();
                    return view('Entertainers.store',compact('entertainer'));
                }else{
                    $entertainer = Entertainer::where('name',$request->name)->firstOrFail();
                    return view("Entertainers.store",compact('entertainer'));
                }

                try{
                    $b->filter('img')->attr('src');
                }catch(Exception $e){
                    
              }
            }
            $entertainer = Entertainer::where('name',$request->name)->firstOrFail();
            return view('Entertainers.store',compact('entertainer'));
        }
        return view('Entertainers.store',compact('entertainer'));
    }
    public function show($id){
        $entertainer = Entertainer::findOrfail($id);
        $comments = $entertainer->comments;
        $favorites = $entertainer->favorites;

        return view('Entertainers.show',compact('entertainer','comments','favorites'));
    }
}