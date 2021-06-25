<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ArticleController extends Controller
{
    public function index($projectId) {
        $articles = Article::where('project_id', $projectId)->get();
        return view('articles.article_list', [
            "articles" => $articles
        ]);
    }

    public function create() {
        return view('articles.article_create');
    }

    public function store(Request $request)
    {
        $projectId = $request->projectId;
        Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'category_id' => ['required', 'integer']
        ])->validate();

        $article = new Article([
            "title" => $request->title,
            "category_id" => $request->category_id,
            "project_id" => $projectId
        ]);
        $article->save();
        return back()->with('success', 'Article created !');
    }

    public function edit(Request $request) {
        $articleId = $request->route('articleId');  
        $article = Article::find($articleId);
        return view('articles.article_edit', [
            "article" => $article
        ]);
    }

    public function update(Request $request) {
        Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'category_id' => ['required', 'integer']
        ])->validate();
        $articleId = $request->route('articleId');
        $article = Article::find($articleId);
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->save();
        return back()->with('success', 'Article updated !');
    }

    public function delete(Request $request) {
        $article = Article::find($request->route('articleId'));
        $article->delete();
        $projectId = $request->route('projectId');
        return redirect("/projects/$projectId/articles")->with('success', 'Article deleted !');
    }
}
