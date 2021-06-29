<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Ban;
use Illuminate\Http\Request;

class IsProjectBanned
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
        $ban = Ban::where('project_id', $request->projectId)->orderBy('until', 'desc')->first();
        if($ban) {
            $today = (new \DateTime())->format('Y-m-d H:i:s');
            if ($ban->until > $today) {
                return back()->withErrors('Project is banned, cause : ' . $ban->cause . ', you can\'t create article until : ' . $ban->until);
            }
        }
        return $next($request);
    }
}
