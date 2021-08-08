<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginCheck
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
        $target = User::where('email',$request->email)->first();
        if ($target){
            if (Hash::check($request->password,$target->password)){
                if ($target->status == CONST_STATUS_ENABLED){
                   session([
                      'role' => $target->role,
                      'email' => $target->email,
                      'name' => $target->name
                   ]);
                   switch ($target->role){
                       case CONST_ROLE_ADMIN:  return redirect()->route('dashboard'); break;
                       case CONST_ROLE_USER:  return redirect()->route('profile'); break;
                   }

                }else{
                    return redirect()->route('/')->withErrors(['msg'=>'<div class="alert alert-warning" id="alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Sorry! </strong>Your account is disabled!!!
                        </div>']);
                }

            }else{
                return redirect()->route('/')->withErrors(['msg'=>'<div class="alert alert-danger" id="alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Sorry! </strong>Password did not matched!
                        </div>']);
            }

        }else{
            return redirect()->route('/')->withErrors(['msg'=>'<div class="alert alert-danger" id="alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Sorry! </strong> Your are not an user!
                        </div>']);
        }
    }
}
