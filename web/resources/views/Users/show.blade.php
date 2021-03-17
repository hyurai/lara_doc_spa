@extends('Layouts.layout')
@section('Entertainer')
<div class = "mypage">
  <p class = "user_name">{{$user->name}}</p>
  <p class = "user_email">{{$user->email}}</p>
</div>
@endsection