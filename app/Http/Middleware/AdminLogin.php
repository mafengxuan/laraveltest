<?php

namespace App\Http\Middleware;

use App\Helpers\Result;
use Closure;

class AdminLogin
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
        if(empty($request->session()->get('adminId'))){
            return response()->json(Result::error('001','请登录'));
        }

        return $next($request);
    }
}
