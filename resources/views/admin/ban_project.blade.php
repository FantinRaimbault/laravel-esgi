@extends('layouts.main_navbar')
@section('contentbis')
<a href="{{ url('admin') }}">
    <button type="button" class="btn btn-primary m-3">
        Back
    </button>
</a>
<h1>Ban project : {{ $project->name }}</h1>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{!! Form::open(['url' => 'admin/bans/projects/' . $project->id]) !!}
{{ Form::label('until', 'Until Date') }}
{{ Form::date('until') }}
{{ Form::label('cause', 'Cause') }}
{{ Form::text('cause') }}
{{ Form::submit('Ban') }}
{!! Form::close() !!}
@endsection