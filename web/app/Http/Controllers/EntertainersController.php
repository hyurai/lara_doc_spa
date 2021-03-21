<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entertainer;
use App\Models\Comment;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Builder;
use Weidner\Goutte\GoutteFacade as GoutteFacade;
class EntertainersController extends Controller

{
    public function index(){
        $entertainers = Entertainer::all();
        return view('Entertainers.index',compact('entertainers'));
    }
    public function create(Entertainer $entertainer){
        return view('Entertainers.create',compact('entertainer'));
    }
    public function store(Request $request,Entertainer $entertainer){
        $URL = "https://talent-dictionary.com/{$request->name}";
        $goutte = GoutteFacade::request('GET', $URL);
        $goutte->filter('.article_header')->each(function ($ul) {

            $ul->filter('.header_top')->each(function ($li) {
                
                $name = $li->filter('h1')->text();
                $entertainer = Entertainer::firstOrNew(['name' => $name]);
               
                if($entertainer->wasResentlyCreated){
                    $entertainer->name = $name;
                    $image_url = $li->filter('img')->attr('src');
                    $entertainer->image_url = $image_url;
                    $classage = $li->filter('.age')->text();
                    $age = rtrim($classage,'歳');
                    $entertainer->age = $age;
                    $entertainer->save();
                }
            });
        });
        $entertainer = Entertainer::where('name',$request->name)->firstOrFail();
        return view('entertainers.store',compact('entertainer'));
    }
    public function show($id){
        $entertainer = Entertainer::findOrfail($id);
        $comments = $entertainer->comments;
        $favorites = $entertainer->favorites;

        return view('Entertainers.show',compact('entertainer','comments','favorites'));
    }
}