<div class="d-flex d-column full-width">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Navbar</a>
            <form method="POST" class="d-flex" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-success" type="submit">Log out</button>
            </form>
        </div>
    </nav>
    <div style="overflow: auto; flex: 1">
        @yield('content')
    </div>
</div>