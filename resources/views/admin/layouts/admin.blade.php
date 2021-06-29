@extends('layouts.main_navbar')
@section('content')
<nav class="nav justify-content-center">
    <a href="{{ url('admin') }}" class="nav-link" >Reports</a>
    <a href="{{ url('admin/banned-projects') }}" class="nav-link" >Banned projects</a>
</nav>
<div class="container">
    @yield('contentbis')
</div>
@endsection