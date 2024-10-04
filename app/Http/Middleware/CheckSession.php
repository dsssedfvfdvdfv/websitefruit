<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    // Kiểm tra xem cookie có tồn tại không
    if (Cookie::has('cookieName')) {
        $expirationTime = 120; // Đổi giờ tùy vào cấu hình của bạn
        $lastLoginTime = Carbon::createFromTimestamp(Cookie::get('lastLoginTime', 0));
        $currentTime = Carbon::now();

        if ($currentTime->diffInMinutes($lastLoginTime) > $expirationTime) {
            // Nếu hết hạn, xóa cookie và quay về trang đăng nhập
            return redirect('/login')->withCookie(Cookie::forget('cookieName'))->withCookie(Cookie::forget('lastLoginTime'));
        }
    }

  return $next($request);
          
}
    
}
