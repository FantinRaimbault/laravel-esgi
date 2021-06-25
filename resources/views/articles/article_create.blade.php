@extends('projects.layouts.app')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<h1>Create an Article</h1>
<div class="d-flex">
    <a href="{{ url('projects/' . Session::get('currentProject')['id'] . '/articles') }}">
        <button type="button" class="btn btn-primary m-3">
            Back
        </button>
    </a>
</div>
{!! Form::open(['url' => 'projects/' . Session::get('currentProject')['id'] . '/articles']) !!}
{{ Form::label('title', 'Project Title') }}
{{ Form::text('title') }}
{{ Form::label('category_id', 'Category') }}
{{ Form::text('category_id') }}
{{ Form::submit('Create') }}
{!! Form::close() !!}
@endsection