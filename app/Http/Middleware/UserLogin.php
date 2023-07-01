<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_id = session('user_id');
        if ($user_id) {
            return $next($request);
        } else {
            $user_id = request()->cookie('user_id');
            if ($user_id) {
                session(['user_id' => $user_id]);
                return $next($request);
            } else {
                return redirect('/login');
            }
        }
    }
}
