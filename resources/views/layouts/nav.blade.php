<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">SO.sosososo.SO</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        @if(Auth::check())
        <a class="btn btn-primary" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="../View/profile_modify_form.php" class="btn btn-primary">Profile</a>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">SignUp</a>
        @endif
      </li>
    </ul>
</nav>