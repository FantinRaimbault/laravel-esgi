@extends('projects.layouts.app')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<h1>Edit an Article</h1>
<div class="d-flex">
    <a href="{{ url('projects/' . Session::get('currentProject')['id'] . '/articles') }}">
        <button type="button" class="btn btn-primary m-3">
            Back
        </button>
    </a>
</div>
{!! Form::open(['url' => 'projects/' . Session::get('currentProject')['id'] . '/articles/' . $article->id, 'method' =>
'put']) !!}
{{ Form::label('title', 'Project Title') }}
{{ Form::text('title', $article->title) }}
{{ Form::label('category_id', 'Category') }}
{{ Form::text('category_id', $article->category_id) }}
{{ Form::submit('Save') }}
{!! Form::close() !!}
<button type="button" class="btn btn-danger m-3" data-toggle="modal" data-target="#exampleModalCenter">
    Delete this Article
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete : {{ $article->title }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you want to delete this Article ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! Form::open(['url' => 'projects/' . Session::get('currentProject')['id'] . '/articles/' .
                $article->id, 'method' =>
                'delete']) !!}
                {{ Form::submit('Delete') }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection