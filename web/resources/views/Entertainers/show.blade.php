<head>
  <title>Comuniect</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="/css/sticky-footer.css" rel="stylesheet" media="screen">
</head>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navbarEexample">
      @Auth
        <ul class="nav navbar-nav">
          <li class=""><a href="/user/{{Auth::id()}}"> MYPAGE</a></li>
          <li class = ""><a href="/entertainer">RETURN</a></li>
        </ul>
        <form action = "/entertainer"class="navbar-form navbar-right" role="search" method = "POST">
          @csrf
          <div  class="form-group">
            <input name = "name" type="text" class="form-control" placeholder="芸能人名">
          </div>
          <button type="submit" class="btn btn-primary">検索</button>
        </form>
        <form action = "/logout" class="navbar-form navbar-left" role="search" method = "POST">
          @csrf
          <button type="submit" class="btn btn-danger">ROGOUT</button>
        </form>
      @else
        <ul class="nav navbar-nav">
          <li class=""><a href="/login">ROGIN</a></li>
          <li class=""><a href="/register">REGISTER</a></li>
          <li class =""><a href="/entertainer">RETURN</a></li>
        </ul>
      @endauth
		</div>
	</div>
</nav>
<div class = "col-xs-6">
  <div class = "center-block">
    <div class = "entertainer-infomations">
      <img src="{{$entertainer->image_url}}" class = "center-block">
      <div class = "text_infomation center-block">
        <p class = "col-xs-6 label label-primary text-name">{{$entertainer->name}}</p>
        <p class = "col-xs-6 label label-primary text-age" >{{$entertainer->age}}</p>
      </div>
    </div>
  </div>
  <div class = "favorite">
    @if(Auth::check())
      @forelse($favorites as $favorite)
        <form action="/entertainer/{{$entertainer->id}}/favorite/{{$favorite->id}}" method = "POST">
          @csrf
          @method('DELETE')
          <input type="hidden" name = "entertainer_id" value = "{{$entertainer->id}}">
          <input type="hidden" name = "id" value = "{{$favorite->id}}"> 
          <button type = "submit" class = "btn btn-warning center-block">ブックマーク解除</button>
        </form>
      @empty
        <form action="/entertainer/{{$entertainer->id}}/favorite" method = "POST">
          @csrf
          <input type="hidden" name = "entertainer_id" value = "{{$entertainer->id}}">
          <input type="hidden" name = "user_id" value = "{{Auth::id()}}">
          <button type = "submit" class = "btn btn-default center-block">お気に入り</button>
        </form>
      @endforelse
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
          @error('text')
            <p>コメントを入力してください</p>
            <p>{{$message}}</p>
          @enderror
          <button type="submit" class="m-100 btn btn-primary center-block">Commemt</button>
       </form>
  </div>
  @else
    <div class = "alert alert-info" role = "alert">
      <p class="not_login_message">ログインをしていません ログインをするとブックマーク・コメントが出来るようになります</p>
    </div>
  @endif
</div>
<div class = "footer_show">
  <div class = "col-xs-12 footer1" style = "background-color:#888888;">
    <p class = "text-white font-weight-bold" style = "color:white;">好きな芸能人について自分なりの意見を持って発信しよう</p>
  </div>
  <div class = "col-xs-12 " style = "background-color:#3e3e3e;">
    <div class = "col-xs-6">
      <h1 class = "text-white font-weight-bold" style = "color:white;">Comuniect</h1>
      <p class = "" style = "color:white;">Entertainer Impression is here</p>
      <p class = "" style = "color:#b3b3b3;">version 1.0.0</p>
    </div>
    <div class = "col-xs-3">
      <p class = "" style = "color:#b3b3b3;">・開発者Hyurai</p>
      <p class = "" style = "color:#b3b3b3;">・リリース4/n</p>
      <p class = "" style = "color:#b3b3b3;">・バックエンド</p>
      <p class = "" style = "color:#b3b3b3;">・言語PHP</p>
    </div>
    <div class = "col-xs-3">
      <p class = "" style = "color:#b3b3b3;">・フレームワークLaravel</p>
      <p class = "" style = "color:#b3b3b3;">・フロントエンド</p>
      <p class = "" style = "color:#b3b3b3;">・jsフレームワークVue.js</p>
      <p class = "" style = "color:#b3b3b3;">・cssフレームワークBoostrap</p>
      <p class = "" style = "color:#b3b3b3;">・開発者Hyurai</p>
    </div>
  </div>
</div>