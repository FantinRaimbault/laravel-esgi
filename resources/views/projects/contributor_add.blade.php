@extends('projects.layouts.app')
@section('content')
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<h1>Add Member to Project</h1>
<div class="d-flex">
    <a href="{{ url('projects/' . Session::get('currentProject')['id'] . '/contributors') }}">
        <button type="button" class="btn btn-primary m-3">
            Back
        </button>
    </a>
</div>
{!! Form::open(['url' => 'invitations/projects/' . Session::get('currentProject')['id'] ]) !!}
{{ Form::label('email', 'Email') }}
{{ Form::text('email') }}
{{ Form::label('role', 'Role') }}
{{ Form::text('role') }}
{{ Form::submit('Send') }}
{!! Form::close() !!}
@endsection