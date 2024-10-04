<?php

namespace App\Http\Middleware;

use App\Models\Online;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class DeleteUser
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next): Response
    {       
        $expirationTime = now('Asia/Ho_Chi_Minh')->subMinutes(30);
        DB::table('onlines')
            ->where('lasttime', '<', $expirationTime)
            ->delete();
           
        return $next($request);
    }
}
