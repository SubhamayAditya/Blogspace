    <style>
    .nav-link.active{
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    color:#000000 !important;
    border-radius:8px;
    font-weight:600;
}

.nav-link:hover{
    background:rgba(255,255,255,.1);
    border-radius:8px;
}

  </style>

<ul class="navbar-nav ms-auto">
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.index') ? 'active' : '' }}" href="/">Home</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.blogs') ? 'active' : '' }}" href="{{ route('blog.blogs') }}">Blogs</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.category') ? 'active' : '' }}" href="{{ route('blog.category') }}">Categories</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.about') ? 'active' : '' }}" href="{{ route('blog.about') }}">About</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog.contact') ? 'active' : '' }}" href="{{ route('blog.contact') }}">Contact</a></li>

    @guest
        <li class="nav-item btn btn-primary ms-3 text-white" style="padding: 0px 10px;"><a class="nav-link"
                href="/login">Login</a></li>
        <li class="nav-item btn btn-primary ms-3 text-white" style="padding: 0px 10px;"><a class="nav-link"
                href="/register">Register</a></li>
    @endguest

    @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                <strong>
                    {{ Auth::user()->name }}
                </strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">

                @if (Auth::user()->role === 'admin')
                    <li><a class="dropdown-item" href="/admin/admindashboard">Admin Dashboard</a></li>
                @elseif (Auth::user()->role === 'user')
                    <li><a class="dropdown-item" href="/user/dashboard">User Dashboard</a></li>
                @endif

                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </li>

        <li class="nav-item ms-3">
            <a href="{{ route('blog.write') }}" class="btn btn-primary text-white">
                <i class="fas fa-pen"></i> Write
            </a>
        </li>
    @endauth
</ul>
