@extends('Layouts.layout')
@section('Entertainer')
<div class = "mypage">
  <p class = "user_name">{{$user->name}}</p>
  <p class = "user_email">{{$user->email}}</p>
</div>
<div class = "entertainer_favorite">
  @foreach($entertainers as $entertainer)
    <img src="{{$entertainer->image_url}}">
    <p>{{$entertainer->name}}</p>
    <p>{{$entertainer->age}}</p>
  @endforeach
</div>
@endsection