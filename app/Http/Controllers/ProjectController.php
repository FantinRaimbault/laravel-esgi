<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index() {
        $user = Auth::user();
        $projects = $user->projects;
        return view('projects.project_list', [
            "projects" => $projects
        ]);
    }

    public function store(Request $request) {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'max:255',
        ])->validate();

        $user = Auth::user();
        $project = new Project([
            "name" => $request->name,
            "description" => $request->description,
            "slug" => preg_replace('/\s+/', '-', strtolower($request->name))
        ]);
        $project->save();
        $user->projects()->attach($project->id, ['role' => Config::get('constants.contributors.roles.superAdmin')]);
        return back()->with('success', 'Project created !');
    }

    public function show($projectId)
    {
        $project = Project::findOrFail($projectId);
        return view('projects.informations', [
            "project" => $project
        ]);
    }

    public function update(Request $request, $projectId) {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'max:255',
        ])->validate();

        Project::where('id', $projectId)
            ->update([
            "name" => $request->name,
            "description" => $request->description,
            ]);
        return back()->with('success', 'Project updated !');
    }
}
