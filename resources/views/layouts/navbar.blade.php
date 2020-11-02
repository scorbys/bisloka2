<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i> Logout
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    style="display: none;">
                    {{ csrf_field() }}
                </form>
            </a>
        </li>
    </ul>
</nav>
