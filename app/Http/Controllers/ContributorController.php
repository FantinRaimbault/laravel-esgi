<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Contributor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class ContributorController extends Controller
{
    public function contributors(Request $request)
    {
        $project = Project::findOrFail($request->route('projectId'));
        $contributors = $project->users;
        return view('projects.contributors', [
            "contributors" => $contributors,
        ]);
    }

    public function addContributor()
    {
        $roles = Config::get('constants.contributors.roles');
        return view('projects.contributor_add', [
            "roles" => $roles
        ]);
    }

    public function edit(Request $request) {
        $roles = Config::get('constants.contributors.roles');
        $contributor = Contributor::findOrFail($request->route('contributorId'));
        return view('projects.contributor_edit', [
            "contributor" => $contributor,
            "roles" => $roles
        ]);
    }

    public function update(Request $request) {
        Validator::make($request->all(), [
            'role' => ['required', Rule::in(Config::get('constants.contributors.roles')),],
        ])->validate();
        $contributor = Contributor::findOrFail($request->route('contributorId'));
        $contributor->role = $request->role;
        $contributor->save();
        return back()->with('success', 'Contributor Updated');
    }

    public function delete(Request $request) {
        $contributor = Contributor::findOrFail($request->route('contributorId'));
        $contributor->delete();
        return redirect('/projects/' . $request->route('projectId') . '/contributors')->with('success', 'User removed !');
    }
}
