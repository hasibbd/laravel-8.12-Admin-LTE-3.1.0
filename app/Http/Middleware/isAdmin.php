<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        if (session('role') == CONST_ROLE_ADMIN){
            return $next($request);
        }
        session()->flush();
        return redirect()->route('/')->withErrors(['msg'=>'<div class="alert alert-danger" id="alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Sorry! </strong> Unauthorized Action Performed!
                        </div>']);
    }
}
