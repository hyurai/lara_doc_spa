@extends('Layouts.layout')
@section('Entertainer')
<div class = "container">
  <div class = "row">
  @foreach($entertainers as $entertainer)
  <div class = "col-sm-2">
      <img src= "{{$entertainer->image_url}}" class = "img-rounded " height = 120 weight = 120>
    <div class = "pt-4">
      <p><a href= "/entertainer/{{$entertainer->id}}" class="btn btn-default btn-sm" role="button">{{$entertainer->name}}</a></p>
      <p>{{$entertainer->age}}</p>
    </div>
  </div>
  @endforeach
  </div>
</div>
@endsection