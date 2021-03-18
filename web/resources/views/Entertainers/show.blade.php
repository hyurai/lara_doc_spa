@extends('layouts.layout')
@section('Entertainer')
<div class = "col-xs-6">
  <div class = "center-block">
      <img src="{{$entertainer->image_url}}" class = "center-block">
      <p class = "text-center">{{$entertainer->name}}</p>
      <p class = "text-center">{{$entertainer->age}}</p>
  </div>
  <div class = "favorite">
    @if(Auth::check())
      @foreach($favorites as $favorite)
        @if($favorite->user_id == Auth::id())
          <form action="/entertainer/{{$entertainer->id}}/favorite/{{$favorite->id}}" method = "POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name = "entertainer_id" value = "{{$entertainer->id}}">
            <input type="hidden" name = "id" value = "{{$favorite->id}}"> 
            <button type = "submit" class = "btn btn-warning center-block">ブックマーク解除</button>
          </form>
        @elseif($favorite->user_id != Auth::id())
          <form action="/entertainer/{{$entertainer->id}}/favorite" method = "POST">
            @csrf
            <input type="hidden" name = "entertainer_id" value = "{{$entertainer->id}}">
            <input type="hidden" name = "user_id" value = "{{Auth::id()}}">
            <button type = "submit" class = "btn btn-default center-block">お気に入り</button>
          </form>
        @endif
      @endforeach
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
          <textarea name="text"  cols="30" rows="10" class = "form-control" placeholder = "コメントをする"></textarea>
          <button type="submit" class="m-100 btn btn-primary center-block">Commemt</button>

       </form>
  </div>
  @else
    <div class = "alert alert-info" role = "alert">
      <p class="not_login_message">ログインをしていません ログインをするとブックマーク・コメントが出来るようになります</p>
    </div>
  @endif
</div> 
@endsection