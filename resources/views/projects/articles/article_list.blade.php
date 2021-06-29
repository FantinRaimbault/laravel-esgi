@extends('projects.layouts.app')
@section('content')
<h1>Articles</h1>
<div class="d-flex justify-content-end">
    <a href="{{ url('projects/' . Session::get('currentProject')['id'] . '/articles/create') }}">
        <button type="button" class="btn btn-primary m-3">
            Create Article
        </button>
    </a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Slug</th>
            <th scope="col">Published</th>
            <th scope="col">Updated at</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $article->title }}</td>
            <td>{{ $article->category->name }}</td>
            <td>{{ $article->slug }}</td>
            <td>{{ $article->published ? 'Yes' : 'No' }}</td>
            <td>{{ $article->updated_at }}</td>
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