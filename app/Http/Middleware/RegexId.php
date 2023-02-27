<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RegexId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $parametersArray = $request->route()->originalParameters();
        foreach ($parametersArray as $parameter => $id) {
            if (!preg_match('/^\d+$/', $id)) {
                abort(404);
            }
        }
        return $next($request);
    }
}
