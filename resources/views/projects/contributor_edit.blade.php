@extends('projects.layouts.app')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<h1>Edit Contributor</h1>
<div class="d-flex">
    <a href="{{ url('projects/' . Session::get('currentProject')['id'] . '/contributors') }}">
        <button type="button" class="btn btn-primary m-3">
            Back
        </button>
    </a>
</div>
{!! Form::open(['url' => 'projects/' . Session::get('currentProject')['id'] . '/contributors/' . $contributor->id, 'method' =>
'put']) !!}
{{ 'Name : ' . $contributor->user->name }}
{{ 'Email : ' . $contributor->user->email }}
{{ Form::label('role', 'Role') }}
{{ Form::text('role', $contributor->role) }}
{{ Form::submit('Save') }}
{!! Form::close() !!}
<button type="button" class="btn btn-danger m-3" data-toggle="modal" data-target="#exampleModalCenter">
    Remove Contributor from project
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete : {{ $contributor->user->name }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you want to remove {{$contributor->user->name}} from this project ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! Form::open(['url' => 'projects/' . Session::get('currentProject')['id'] . '/contributors/' .
                $contributor->id, 'method' => 'delete']) !!}
                {{ Form::submit('Delete') }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection