<?php

namespace App\Http\Controllers;

use App\Events\MessageWasSent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessengerController extends Controller
{
    public function index(Request $request) {
        $messages = Message::where('project_id', $request->projectId)->get();
        return view('projects.messenger', ['messages' => $messages, 'projectId'=> $request->projectId, 'userId' => Auth::id()]);
    }

    public function postMessage(Request $request){
        Validator::make($request->all(), [
            'message' => ['required', 'max:255'],
        ])->validate();

        $message = new Message([
            "message"=>$request->message,
            "project_id"=>$request->projectId,
            "user_id"=>Auth::id()
        ]);
        $message->save();
        event(new MessageWasSent($request->projectId, [
            "message"=>$request->message,
            "user"=>$message->user->name,
            "created_at", $message->created_at->format('H:m:s d/m/Y')
        ]));
        return back()->with('success', 'Message envoyé !');
    }
}
