<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\Article;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;
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
}
