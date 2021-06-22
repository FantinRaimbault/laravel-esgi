@extends('layouts.app')

<h1>Create project</h1>
@if ($errors->any())
<div class="alert alert-primary" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{!! Form::open(['url' => '/projects']) !!}
{{ Form::label('name', 'Nom du projet') }}
{{ Form::text('name') }}
{{ Form::label('description', 'Description du projet') }}
{{ Form::text('description') }}
{{ Form::submit('Create') }}
{!! Form::close() !!}

<div class="p-6 bg-white border-b border-gray-200">
    <h1>Projects View</h1>
    @foreach($projects as $project)
    <h2>Nom du projet: {{ $project->name}}</h2>
    @foreach($project->users as $user)
    <span>Collaborateurs: {{ $user->name }}</span>
    @endforeach
    @endforeach
</div>