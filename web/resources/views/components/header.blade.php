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
          <li class = ""><a href="/home">Comuniect</a></li>
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
          <li class = ""><a href="/home"> Comuniect</a></li>
          <li class=""><a href="/login">ROGIN</a></li>
          <li class=""><a href="/register">REGISTER</a></li>
          <li class =""><a href="/entertainer">RETURN</a></li>
        </ul>
      @endauth
		</div>
	</div>
</nav>
