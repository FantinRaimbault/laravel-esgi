<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasAlreadySentReport
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
        $report = Report::where([
            ['user_id', '=', Auth::id()],
            ['article_id', '=', $request->route('articleId')]
        ])->first();
        if (!empty($report)) {
            return back()->withErrors('You have already send a report for this project');
        }
        return $next($request);
    }
}
