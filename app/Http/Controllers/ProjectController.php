<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('projects.project', [
            "projects" => $projects
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:1',
            'description' => 'max:1',
        ])->validate();

        $user = Auth::user();
        $project = new Project([
            "name" => $request->name,
            "description" => $request->description,
        ]);
        $project->save();
        $user->projects()->attach($project->id);
    }
}
