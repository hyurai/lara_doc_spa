@extends('Layouts.layout')
@section('Entertainer')
<div class = "mypage">
  <p class = "user_name">{{$user->name}}</p>
  <p class = "user_email">{{$user->email}}</p>
</div>
<div>
  @foreach($favorites as $favorite)
    <img src="{{$favorite->image_url}}">
    <p>{{$favorite->name}}</p>
    <p>{{$favorite->age}}</p>
  @endforeach
</div>
@endsection