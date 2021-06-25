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
<h1>Contributors</h1>
<div class="d-flex justify-content-end">
    <a href="{{ url('projects/' . Session::get('currentProject')['id'] . '/contributors/add') }}">
        <button type="button" class="btn btn-primary m-3">
            Add Contributor to Project
        </button>
    </a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contributors as $contributor)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $contributor->name }}</td>
            <td>{{ $contributor->email }}</td>
            <td>{{ $contributor->pivot->role }}</td>
            <td>
                @if ($contributor->canEditContributor($contributor->pivot))
                <a href="{{ url('projects/' . Session::get('currentProject')['id'] . '/contributors/' . $contributor->pivot->id ) }}">
                    <button type="button" class="btn btn-primary" data-toggle="modal">
                        Edit
                    </button>
                </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection