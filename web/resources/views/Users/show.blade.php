@extends('Layouts.layout')
@section('Entertainer')
<div class = "mypage">
  <p class = "user_name">{{$user->name}}</p>
  <p class = "user_email">{{$user->email}}</p>
</div>
<div class = "entertainer_favorite">
  @foreach($favorites as $favorite)
    
  @endforeach
</div>
@endsection