@extends('projects.layouts.app')
@section('content')
    <div style="display: flex;align-items: center; justify-content: space-between; flex-direction: column; height: 100%">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul
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
        <h1 style="margin-top: 2%">Messagerie</h1>
        <div id="messages" style="height: 75%; width: 70%; background-color: #F5F7F7; display: flex; align-items: center; overflow: scroll; flex-direction: column">
            @foreach($messages as $m)
                <div class="{{ $m->user_id === $userId ? 'alert alert-info' : 'alert alert-secondary' }}" style="display: flex; align-self: {{ $m->user_id === $userId ? 'flex-end' : 'flex-start' }}; flex-direction: column;justify-content: space-between; align-items: center; width: 35%;">
                    <p>{{$m->user_id === $userId? 'Me' : $m->user->name}} at {{$m->created_at}}</p>
                    <p>{{$m->message}}</p>
                </div>
            @endforeach
        </div>
        <div style="margin-bottom: 5%">
            {!! Form::open(['url' => 'projects/'. $projectId .'/messenger']) !!}
            {{ Form::label('message', 'Message') }}
            {{ Form::text('message') }}
            {{ Form::submit('Envoyer') }}
            {!! Form::close() !!}
        </div>
    </div>

    <script>
        const container = document.querySelector('#messages')

        container.scrollTop = container.scrollHeight;

        const div = document.createElement('div');
        var channel = Echo.channel('project-{{$projectId}}');
        channel.listen('.message', function(data) {
            div.innerHTML = `<p>${data.message.user} at ${data.message.created_at}</p><p>${data.message.message}</p>`;
            container.appendChild(div);
        });
    </script>
@endsection
