<header>
        <nav class="navbar navbar-default">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <a class="navbar-brand" href="#">Restaurant Manager</a>
            </div>
            <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="/reservation">Reservation</a></li>
            @if(Auth::guest())
            <li><a href="/login">Login</a></li>
            @else
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/logout">Logout</a></li>
            @endif
        </nav>
</header>