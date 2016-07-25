<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if (empty($request->user())){
            return redirect('admin/auth/login');
        }

        if ($request->user()->role_id != 1)
        {
            return redirect('home');
        }
        return $next($request);
    }
}