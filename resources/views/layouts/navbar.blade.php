<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="#" class="navbar-brand"> Admin </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedCoontent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('employees.index') }}"> Employee </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('department.index') }}"> Department </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" id="form1">
                                    @csrf
                                    <a href="javascript:void()" onclick="form1.submit();" class="dropdown-item"> Logout
                                    </a>
                                </form>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li> <a href="#" class="dropdown-item"> Setting </a> </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('accounts/login') ? 'active' : '' }}"
                            href="{{ route('login') }}"> Login </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('accounts/register') ? 'active' : '' }}"
                            href="{{ route('accounts.create') }}"> Register </a>
                    </li>
                @endauth
            </ul>
            <form class="d-flex" role="search" action="{{ url()->current() }}" method="GET">
                <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
