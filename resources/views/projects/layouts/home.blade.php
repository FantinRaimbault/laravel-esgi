@extends('layouts.main_navbar')
@section('content')
<nav class="nav justify-content-center">
    <a href="{{ url('projects') }}" class="nav-link">My projects</a>
    <a href="{{ url('articles') }}" class="nav-link">Articles Community</a>
</nav>
<div class="container">
    @yield('contentbis')
</div>
@endsection