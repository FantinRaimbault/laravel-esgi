<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Project;
use App\Models\Contributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasAccessToProject
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $projectId = $request->projectId;
        $contributor =  Contributor::where('user_id', Auth::id())->where('project_id', $projectId)->first();
        if(empty($contributor)) {
            return redirect('/projects');
        }
        return $next($request);
    }
}
