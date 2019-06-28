<?php

namespace App\Http\Middleware;

use Closure;

class Bai
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
        if(!session('id')){
            return redirect('login/login');
        }
        return $next($request);
    }
}
