<?php

namespace App\Http\Controllers;

use App\Models\Article;

class AdminController extends Controller
{
    public function index() {
        $articles = Article::has('reports')->get()->sortBy(function($article) {
            return $article->reports->count();
        });
        return view('admin.reports', [
            "articles" => $articles
        ]);
    }
}
