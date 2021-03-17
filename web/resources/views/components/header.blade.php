<nav class = "navbar navbar-inverse navbar-static-top">
  <div class = "container">
    <ul class="nav navbar-nav">
      @Auth
        <li class = "active"><a href="/entertainer/create">SEARCH</a></li>
        <li class = "active"><a href="/user/{{Auth::id()}}">MYPAGE</a></li>
        <li class = "active"><a href="/">USEREDIT</a></li>
        <li class = "active"><a href="/">LOGOUT</a></li>
      @else
        <li class = "active"><a href="/login">LOGIN</a></li>
        <li class = "active"><a href="/register">REGISTER</a></li>
      @endauth
      <li class = "active"><a href="/entertainer">RETURN</a></li>
  </ul>
  </div>
</nav>