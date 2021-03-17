@extends('Layouts.layout')
@section('Entertainer')
<div class = "create_form">
  <form action="/entertainer" method = "post">
    <input type="hidden" name="_method" value="POST">
    @csrf
    <div class = "image_urlTextField">
        <label for="image_url">画像のurl</label>
        <input type="text" name = "image_url">
    </div>
    <div class = "nameTextField">
        <label for="name">名前</label>
        <input type="text" name = "name">
    </div>
    <div class = "ageTextField">
        <label for="age">年齢</label>
        <input type="integer" name = "age">
    </div>
    <button type = "submit" class = "btn btn-primary">SEND</button>
  </form>
</div>
@endsection