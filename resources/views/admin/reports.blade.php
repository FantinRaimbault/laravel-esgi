@extends('admin.layouts.admin')
@section('contentbis')
<h1>Reports</h1>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@foreach ($articles as $article)
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Title : {{ $article->title }} - Description : {{ $article->description }} - Number of report : {{ count($article->reports) }}
            </button>
        </h2>
        {{-- remove show to not shot first time --}}
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <a href="{{ url('admin/articles/' . $article->id . '/delete') }}">
                <button  type="button" class="btn btn-danger m-3" data-toggle="modal" data-target="#exampleModalCenter">
                    Delete article
                </button>
            </a>
            <a href="{{ url('admin/bans/projects/' . $article->project_id) }}">
                <button type="button" class="btn btn-danger m-3" data-toggle="modal" data-target="#exampleModalCenter">
                    Ban project
                </button>
            </a>
            @foreach ($article->reports as $report)
            <div class="accordion-body">
                Report message : {{ $report->message }} - by : {{ $report->user->name }} / {{ $report->user->email }}
            </div>
            @endforeach
        </div>
    </div>
</div>
@endforeach

@endsection