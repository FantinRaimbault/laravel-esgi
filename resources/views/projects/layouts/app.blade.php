@extends('layouts.app')
@section('main')
<div class="full-height bg-gray-100">
    <div class="d-flex full-height">
        @include('projects.layouts.sidebar')
        @include('projects.layouts.navbar')
    </div>
</div>
@endsection