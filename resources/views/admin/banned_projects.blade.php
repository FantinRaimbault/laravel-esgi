@extends('admin.layouts.admin')
@section('contentbis')
<h1>Banned projects</h1>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Name</th>
            <th scope="col">Cause</th>
            <th scope="col">Until</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bans as $ban)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $ban->project->name }}</td>
            <td>{{ $ban->cause ?? 'no cause' }}</td>
            <td>{{ $ban->until }}</td>
            <td>
                {!! Form::open(['url' => '/admin/banned-projects/' . $ban->project_id, 'method' => 'delete']) !!}
                {{ Form::submit('Remove ban') }}
                {!! Form::close() !!}
            </td>
            {{-- <td>
                <a
                    href="{{ url('projects/' . Session::get('currentProject')['id'] . '/articles/' . $article->id . '/edit') }}">
                    <button type="button" class="btn btn-primary" data-toggle="modal">
                        Edit
                    </button>
                </a>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
@endsection