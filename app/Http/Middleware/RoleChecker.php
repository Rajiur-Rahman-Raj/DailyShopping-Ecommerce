<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      if(Auth::user()->role == 1){
        return redirect('user/dashboard');

      }else{
        return redirect('/admin/dashboard');
        return $next($request);
      }

    }
}
