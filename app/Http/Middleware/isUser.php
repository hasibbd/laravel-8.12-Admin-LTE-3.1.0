<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isUser
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
        if (session('role') == CONST_ROLE_USER){
            return $next($request);
        }
        session()->flush();
        return redirect()->route('/')->withErrors(['msg'=>'Unauthorized Action Performed']);
    }
}
