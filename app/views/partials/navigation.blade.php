<header>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <a class="navbar-brand" href="/">Restaurant Manager</a>
            </div>
            <ul class="nav navbar-nav">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="/reservation"><i class="fa fa-check"></i> Reservations</a></li>
            @if(Auth::guest())
            <li><a href="/register"><i class="fa fa-user"></i> Register</a></li>
            <li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
            @elseif(checkRole('admin') || checkRole('manager'))
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/logout"><i class="fa fa-user"></i> Logout ({{Auth::user()->username}})</a></li>
            @else
            <li><a href="/logout"><i class="fa fa-user"></i> Logout ({{Auth::user()->username}})</a></li>
            @endif
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li><a href="https://github.com/slawisha/RestaurantManager"><i class="fa fa-github fa-1x"></i> Github</a></li>
            </ul>
        </nav>
</header>