<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleUser
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
        if (Auth::check()){
            $user = Auth::user()->whereIn('role_id', [1,2]);
            if ($user){
                return $next($request);
            }
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }
}
