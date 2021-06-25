<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Contributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanEditContributor
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
        $user = Auth::user();
        $contributor = Contributor::find($request->route('contributorId'));
        if(!$user->canEditContributor($contributor)) {
            return back()->withErrors('Can\'t access to this ressource !');
        }
        return $next($request);
    }
}
