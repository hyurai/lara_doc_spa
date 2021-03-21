@extends('Layouts.layout')
@section('Entertainer')
<div class = "mypage">
  <p class = "user_name">{{$user->name}}</p>
  <p class = "user_email">{{$user->email}}</p>
</div>
<div class = "entertainer_favorite">
  <h1>自分がブックマークをした芸能人</h1>
  @foreach($entertainers as $entertainer)
    <div class = "col-sm-2">
      <img src="{{$entertainer->image_url}}" class = "img_rounded" height = 120 weight = 120>
      <p class = "col-xs-8"><a href="/entertainer/{{$entertainer->id}}" class="btn btn-default btn-sm" role="button">{{$entertainer->name}}</a></p>
      <p>{{$entertainer->age}}</p>
    </div>
  @endforeach
</div>
@endsection