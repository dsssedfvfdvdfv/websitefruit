<?php

namespace App\Http\Middleware;

use App\Models\Online;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class OnlineUserCounter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            if (!Session::get('user_visitor')) {
                Session::put('user_visitor', $_SERVER['HTTP_COOKIE']);
                $sessionid = Session::get('user_visitor');
                $lasttime = now('Asia/Ho_Chi_Minh');
                $ip = $request->ip();
                $user = Online::getCountUser($sessionid, $lasttime, $ip);               
                return $next($request);
            }
        }          
        return $next($request);
    }
    
}
