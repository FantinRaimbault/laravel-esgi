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
<h1>Informations</h1>
{!! Form::open(['url' => "/projects/" . $project->id, 'method' => 'put']) !!}
{{ Form::label('name', 'Nom du projet') }}
{{ Form::text('name', $project->name) }}
{{ Form::label('description', 'Description du projet') }}
{{ Form::text('description', $project->description) }}
{{ Form::submit('Update') }}
{!! Form::close() !!}
@endsection