<ul class="navbar-nav mr-auto">
    @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @else
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="site-menu-title">Sleep</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="site-menu-title">Exercise</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="site-menu-title">Eating</span>
            </a>
        </li>
    @endguest
</ul>
