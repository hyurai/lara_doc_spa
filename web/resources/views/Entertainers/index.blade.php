@extends('Layouts.layout')
@section('Entertainer')
<div class = "container">
  <div class = "row">
  @foreach($entertainers as $entertainer)
  <div class = "col-sm-2">
      <img src= "{{$entertainer->image_url}}" class = "img-rounded " height = 120 weight = 120>
    <div class = "">
      <p class = "col-xs-8"><a href= "/entertainer/{{$entertainer->id}}" class="btn btn-default btn-sm" role="button">{{$entertainer->name}}</a></p>
      <p class = "col-xs-4">{{$entertainer->age}}</p>
    </div>
  </div>
  @endforeach
  </div>
</div>
@endsection