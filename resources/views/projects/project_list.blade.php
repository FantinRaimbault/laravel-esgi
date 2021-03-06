@extends('projects.layouts.home')
@section('contentbis')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
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
        @forelse ($projects as $project)
            <a href="{{ url('projects/' . $project->id . '/informations') }}">
                <h2>Nom du projet: {{ $project->name }}</h2>
            </a>

            @foreach ($project->users as $user)
                <span>Collaborateurs: {{ $user->name }}</span>
            @endforeach
        @empty
        <p>No projects here ...</p>
        @endforelse
    </div>
@endsection
