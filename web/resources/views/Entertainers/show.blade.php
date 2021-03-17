@extends('layouts.layout')
@section('Entertainer')
<div class = "col-xs-6">
  <div class = "entertainer_parsonal_page">
      <img src="{{$entertainer->image_url}}">
      <p class = "entertainer_name">{{$entertainer->name}}</p>
      <p class = "entertainer_age">{{$entertainer->age}}</p>
  </div>
  <div class = "favorite">
    @if(Auth::check())
      @if($favorite)
        <form action="/entertainer/{{$entertainer->id}}/favorite" method = "POST">
        <input type="hidden" name = "entertainer_id" value = "{{$entertainer->id}}">
        @csrf
        @method('DELETE')
          <button type="submit" class="btn btn-warning">ブックマーク解除</button>
        </form>
      @else
        <form action="/entertainer/{{$entertainer->id}}/favorite" method = "POST">
          @csrf
          <input type="hidden" name = "user_id" value = "{{Auth::id()}}">
          <input type="hidden" name = "entertainer_id" value = "{{$entertainer->id}}">
          <button type="submit" class="btn btn-default">お気に入り</button>
        </form>
      @endif
    @endif
  </div>
</div>
<div class = "col-xs-6">
  <div class = "comments">
      @foreach($comments as $comment)
        @if($entertainer->id == $comment->entertainer_id)
          <div class = "well">
            {{$comment->text}}
          </div>
        @endif
      @endforeach
  </div> 
  @auth
  <div class = "comment-form">
      <form action="/entertainer/{{$entertainer->id}}/comment" method = "post">
          @csrf
          <input type="hidden" name = "_method" value = "POST">
          <input type="hidden" name = "entertainer_id" value = "{{$entertainer->id}}">
          <input type="hidden" name = "user_id" value = "{{Auth::id()}}">
          <label for="comment">コメントをする</label>
          <input type="text" name="text">
          <button type = "submit">送信</button>
      </form>
  </div>
  @else
    <div class = "alert alert-info" role = "alert">
      <p class="not_login_message">ログインをしていません ログインをするとブックマーク・コメントが出来るようになります</p>
    </div>
  @endif
</div>
@endsection