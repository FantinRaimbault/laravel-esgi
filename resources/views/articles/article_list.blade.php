@extends('projects.layouts.app')
@section('content')
<h1>Articles</h1>
<div class="d-flex justify-content-end">
    <a href="{{ url('projects/' . Session::get('currentProject')['id'] . '/articles/create') }}">
        <button type="button" class="btn btn-primary m-3">
            Créer un Article
        </button>
    </a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Title</th>
            <th scope="col">Updated at</th>
            <th scope="col">Category</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $article->title }}</td>
            <td>{{ $article->updated_at }}</td>
            <td>{{ $article->category_id }}</td>
            <td>
                <a href="{{ url('projects/' . Session::get('currentProject')['id'] . '/articles/' . $article->id . '/edit') }}">
                    <button type="button" class="btn btn-primary" data-toggle="modal">
                        Edit
                    </button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection