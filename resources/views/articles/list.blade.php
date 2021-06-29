<h1>Articles</h1>
@forelse ($articles as $article)
    <div class="">
        Article : {{ $article->title }}
        Category : {{ $article->category_id }}
        By: {{ $article->project->name }}
        <a href="{{ url('/reports/articles/' . $article->id ) }}">Report</a>
    </div>
@empty
    
@endforelse