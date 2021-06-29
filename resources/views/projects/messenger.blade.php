@extends('projects.layouts.app')
@section('content')
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
    <h1>Messagerie</h1>
    <div id="messages">
        @foreach($messages as $m)
            <div>
            <p>{{$m->user->name}} at {{$m->created_at}}</p>
            <p>{{$m->message}}</p>
            </div>
        @endforeach
    </div>

    {!! Form::open(['url' => 'projects/'. $projectId .'/messenger'])  !!}
    {{ Form::label('message', 'Message') }}
    {{ Form::text('message') }}
    {{ Form::submit('Envoyer') }}
    {!! Form::close() !!}

    <script>
        const container = document.querySelector('#messages')
        const div = document.createElement('div');
        console.log({{$projectId}})
        var channel = Echo.channel('project-{{$projectId}}');
        channel.listen('.message', function(data) {
            div.innerHTML = `<p>${data.message.user} at ${data.message.created_at}</p><p>${data.message.message}</p>`;
            container.appendChild(div);
        });
    </script>
@endsection
