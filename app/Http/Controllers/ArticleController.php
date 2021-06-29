<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index($projectId) {
        $articles = Article::where('project_id', $projectId)->get();
        return view('projects.articles.article_list', [
            "articles" => $articles
        ]);
    }

    public function create() {
        $categories = Category::where('type', 'article')->select('id', 'name')->get();
        $categoriesKeyName = [];
        foreach ($categories->toArray() as $value) {
            $categoriesKeyName[$value['id']] = $value['name'];
        }
        return view('projects.articles.article_create', [
            'categories' => $categoriesKeyName
        ]);
    }

    public function store(Request $request)
    {
        $projectId = $request->projectId;
        Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'category_id' => ['required', 'integer', 'exists:categories,id']
        ])->validate();

        $article = new Article([
            "title" => $request->title,
            "category_id" => $request->category_id,
            "project_id" => $projectId,
            "slug" => preg_replace('/\s+/', '-', strtolower($request->title))
        ]);
        $article->save();
        return back()->with('success', 'Article created !');
    }

    public function edit(Request $request) {
        $articleId = $request->route('articleId');  
        $article = Article::findOrFail($articleId);
        $categories = Category::where('type', 'article')->select('id', 'name')->get();
        $categoriesKeyName = [];
        foreach ($categories->toArray() as $value) {
            $categoriesKeyName[$value['id']] = $value['name'];
        }
        return view('projects.articles.article_edit', [
            "article" => $article,
            'categories' => $categoriesKeyName
        ]);
    }

    public function update(Request $request) {
        Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'category_id' => ['required', 'integer'],
            'published' =>  ['boolean']
        ])->validate();
        $articleId = $request->route('articleId');
        $article = Article::findOrFail($articleId);
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        if(!Auth::user()->isEditor()) {
            $article->published = !is_null($request->published);
        }
        $article->save();
        return back()->with('success', 'Article updated !');
    }

    public function delete(Request $request) {
        $article = Article::findOrFail($request->route('articleId'));
        $article->delete();
        $projectId = $request->route('projectId');
        return redirect("/projects/$projectId/articles")->with('success', 'Article deleted !');
    }

    public function list() {
        $articles = Article::where('published', 1)->get();
        return view('articles.list', [
            "articles" => $articles
        ]);
    }
}
