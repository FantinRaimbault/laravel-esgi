@extends('layouts.main_navbar')
@section('content')
    <div class="container">
        <h1>Articles</h1>
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (!empty($articles))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Published By</th>
                    <th scope="col">Published at</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td scope="row">{{ $article->title }}</td>
                        <td>{{ $article->category->name }}</td>
                        <td>{{ $article->project->name }}</td>
                        <td>{{ $article->updated_at }}</td>
                        <td>
                            <a href="{{ url('/articles/' . $article->project->slug . '/' . $article->slug ) }}">
                                <button type="button" class="btn btn-primary">
                                    See
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ url('/reports/articles/' . $article->id) }}">
                                <button type="button" class="btn btn-danger">Report</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>No articles.</p>
        @endif
    </div>
@endsection
