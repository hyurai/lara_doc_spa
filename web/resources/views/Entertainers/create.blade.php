@extends('Layouts.layout')
@section('Entertainer')
<div class = "create_form">
  <form action="/entertainer" method = "post">
    @csrf
    <label for="検索したい芸能人の名前を入力してください"></label>
    <input type="text" name = "name">
    <button type = "submit" class = "btn btn-primary">SEND</button>
  </form>
</div>
@endsection