<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role_id = Auth::user()->role; 
		
				if($role_id ==2 ){
					return redirect('/fieldsupervisor');     
				} elseif($role_id == 1){
							return redirect('/fieldsupervisor/dashboard');
				} elseif($role_id == 3){
							return redirect('/home/superadmin');
				}elseif($role_id == 4){
							return redirect('/home/senior');
				}elseif($role_id == 5){
							return redirect('/home/finance');
				}
            }
        }

        return $next($request);
    }
}
