<?php

namespace App\Http\Middleware;

use App\Models\Online;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class UpdateTimeOnline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $visitor = Session::get('user_visitor');
            if (Session::get('user_visitor')) {
                return $next($request);
            }
        }
    
        // Nếu không thỏa điều kiện ở trên, chỉ tiếp tục xử lý yêu cầu
        return $next($request);
    }
    
}
