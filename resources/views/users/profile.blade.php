@extends('layouts.main_navbar')
@section('content')
    <div class="container">
        <h1>Your profile : Hello {{ $user->name }} ! 👋</h1>
        @forelse($user->invitations as $invitation)
            Project invitation : {{ $invitation->project->name }}
            {{-- Accept --}}
            {!! Form::open(['url' => 'invitations/' . $invitation->id . '/accept', 'method' => 'delete']) !!}
            {{ Form::submit('Accept') }}
            {!! Form::close() !!}
            {{-- Refuse --}}
            {!! Form::open(['url' => 'invitations/' . $invitation->id . '/refuse', 'method' => 'delete']) !!}
            {{ Form::submit('Refuse') }}
            {!! Form::close() !!}
        @empty
            <p>No invitations here ...</p>
        @endforelse
    </div>
@endsection
