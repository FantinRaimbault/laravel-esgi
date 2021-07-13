@extends('layouts.app')
@section('main')
    <div class="d-flex d-column full-width">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a href="{{ url('projects') }}" class="navbar-brand">Article World</a>
                <div class="d-flex">
                    <a href="{{ url('users/profile') }}">
                        <button class="btn btn-outline-success">{{ Auth::user()->name }}</button>
                    </a>
                    @if (Auth::user()->isAdminApp())
                        <a href="{{ url('admin') }}">
                            <button class="btn btn-outline-success">Admin</button>
                        </a>
                    @endif
                    <form method="POST" class="d-flex" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-success" type="submit">Log out</button>
                    </form>
                </div>
            </div>
        </nav>
        <div style="overflow: auto; flex: 1">
            @yield('content')
        </div>
    </div>
@endsection
