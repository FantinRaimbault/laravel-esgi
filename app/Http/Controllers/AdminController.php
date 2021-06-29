<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\Article;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    public function showBanProject(Request $request) {
        $project = Project::findOrFail($request->route('projectId'));
        return view('admin.ban_project', [
            "project" => $project
        ]);
    }

    public function storeBanProject(Request $request) {
        Validator::make($request->all(), [
            'until' => ['required', 'date', 'after:today'],
            'cause' => ['required'],
        ])->validate();
        $ban = new Ban([
            "project_id" => $request->route('projectId'),
            "cause" => $request->cause ?? '',
            "until" => $request->until
        ]);
        $ban->save();
        return back()->with('success', 'project banned !');
    }

    public function showDeleteArticle(Request $request) {
        $article = Article::findOrFail($request->route('articleId'));
        return view('admin.article_delete', [
            "article" => $article
        ]);
    }

    public function deleteArticle(Request $request) {
        $article = Article::findOrFail($request->route('articleId'));
        $article->delete();
        return back()->with('success', 'Article deleted !');
    }

    public function showBannedProject() {
        $bans = Ban::groupBy('project_id')->get(['project_id', DB::raw('MAX(until) as until')]);
        return view('admin.banned_projects', [
            "bans" => $bans
        ]);
    }

    public function removeBannedProject(Request $request) {
        Ban::where('project_id', $request->route('projectId'))->delete();
        return back()->with('success', 'Ban removed from project !');
    }
}
