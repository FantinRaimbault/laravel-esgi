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
        $project = Project::find($request->route('projectId'));
        $contributors = $project->users;
        return view('projects.contributors', [
            "contributors" => $contributors,
        ]);
    }

    public function addContributor(Request $request)
    {
        return view('projects.contributor_add');
    }

    public function edit(Request $request) {
        $contributor = Contributor::find($request->route('contributorId'));
        return view('projects.contributor_edit', [
            "contributor" => $contributor
        ]);
    }

    public function update(Request $request) {
        Validator::make($request->all(), [
            'role' => ['required', Rule::in(Config::get('constants.contributors.roles')),],
        ])->validate();
        $contributor = Contributor::find($request->route('contributorId'));
        $contributor->role = $request->role;
        $contributor->save();
        return back()->with('success', 'Contributor Updated');
    }

    public function delete(Request $request) {
        $contributor = Contributor::find($request->route('contributorId'));
        dd($contributor);
        $contributor->delete();
        return redirect('/projects/' . $request->route('projectId') . '/members')->with('success', 'User removed !');
    }
}
