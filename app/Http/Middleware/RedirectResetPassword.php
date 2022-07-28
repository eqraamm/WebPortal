<?php

namespace App\Http\Middleware;

use Closure;

class RedirectResetPassword
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
        if(!session('Reset_PasswordF')){
            return redirect('/');
        }
        return $next($request);
    }
}
