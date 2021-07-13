@extends('layouts.main_navbar')
@section('content')
<div class="container">
    <h1>Report Article : {{ $article->title }}</h1>
    {!! Form::open(['url' => 'reports/articles/' . $article->id]) !!}
    {{ Form::label('message', 'Report Message') }}
    {{ Form::text('message') }}
    {{ Form::submit('Send') }}
    {!! Form::close() !!}
</div>
@endsection