<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invitation;
use App\Models\Contributor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class InvitationController extends Controller
{
    public function send(Request $request) {
        Validator::make($request->all(), [
            'email' => ['required', 'email:rfc,dns'],
            'role' => ['required', Rule::in(Config::get('constants.contributors.roles')),],
        ])->validate();
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if(empty($user)) {
            return back()->withErrors('Email not found');
        }
        $contributor = Contributor::where([
            ['user_id', '=', $user->id],
            ['project_id', '=', $request->route('projectId')]
        ])->first();
        if(!empty($contributor)) {
            return back()->withErrors('User already contributor of this project');
        }
        $invitation = new Invitation([
            "project_id" => $request->route('projectId'),
            "user_id" => $user->id,
            "role" => $request->role
        ]);
        $invitation->save();
        return back()->with('success', 'Invitation sent !');
    }

    public function accept(Request $request) {
        $invitation = Invitation::find($request->route('invitationId'));
        $contributor = new Contributor([
            "project_id" => $invitation->project_id,
            "user_id" => $invitation->user_id,
            "role" => $invitation->role
        ]);
        $contributor->save();
        $invitation->delete();
        return back()->with('success', 'Invitation accepted !');
    }

    public function refuse(Request $request) {
        $invitation = Invitation::find($request->route('invitationId'));
        $invitation->delete();
        return back();
    }
}
