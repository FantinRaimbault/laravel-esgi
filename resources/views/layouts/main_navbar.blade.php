@extends('layouts.app')
<div class="d-flex d-column full-width">
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="{{ url('projects') }}" class="navbar-brand">Article World</a>
            <div class="d-flex">
                @if (Auth::user()->isAdminApp())
                <a href="{{ url('admin') }}">
                    <button class="btn btn-outline-success" type="submit">Admin</button>
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