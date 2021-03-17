@extends('Layouts.layout')
@section('Entertainer')
<div class = "entertainer_store">
  <img src="{{$entertainer->image_url}}">
  <p>{{$entertainer->name}}</p>
  <p>{{$entertainer->age}}</p>
</div>
@endsection