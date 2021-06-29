@section('contentbis')
{{-- <a href="{{ url('admin') }}">
    <button type="button" class="btn btn-primary m-3">
        Back
    </button>
</a> --}}
<h1>Delete Article : {{ $article->title }}</h1>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{!! Form::open(['url' => '/admin/article/' . $article->id .'/delete', 'method' => 'delete']) !!}
{{ Form::submit('Delete') }}
{!! Form::close() !!}
@endsection