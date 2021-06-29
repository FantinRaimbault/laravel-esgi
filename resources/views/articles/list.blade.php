@extends('layouts.main_navbar')
@section('content')
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
@forelse ($articles as $article)
<div class="">
    Article : {{ $article->title }}
    Category : {{ $article->category_id }}
    By: {{ $article->project->name }}
    <a href="{{ url('/reports/articles/' . $article->id ) }}">Report</a>
</div>
@empty
No Articles
@endforelse
@endsection