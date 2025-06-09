<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class ApplicantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {   
        $user = $request->user();
        if ($user && $user->role === 'applicant') {
            return $next($request);
        }
        return response()->json(['error' => 'Unauthorized'], 403);
    }

}
