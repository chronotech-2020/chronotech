<ul class="navbar-nav mr-auto">
    @guest
        
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sleep.index') }}">
                <span class="site-menu-title">Sleep</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="site-menu-title">Eat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="site-menu-title">Run</span>
            </a>
        </li>
    @endguest
</ul>
