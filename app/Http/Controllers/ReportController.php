<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function index(Request $request) {
        $article = Article::findOrFail($request->articleId);
        return view('reports.create', [
            "article" => $article
        ]);
    }

    public function store(Request $request) {
        $articleId = $request->route('articleId');
        Validator::make($request->all(), [
            'message' => ['required', 'max:255'],
        ])->validate();
        $report = new Report([
            "message" => $request->message,
            "article_id" => $articleId,
            "user_id" => Auth::id(),
        ]);
        $report->save();
        return redirect('/articles')->with('success', 'Report sent !');
    }
}
