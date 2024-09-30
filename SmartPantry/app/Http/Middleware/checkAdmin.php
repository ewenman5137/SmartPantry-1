<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedRoles = [2];
        if (!in_array(Auth::user()->role_id, $allowedRoles)) {
            return redirect()->back()->with('error', __('Sorry, you are not authorized to access that location.'));
        }
        return $next($request);
    }
}
