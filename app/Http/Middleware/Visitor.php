<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Visitor
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
        $newsId = (int) explode('/', $request->getRequestUri())[2];
        $ip = $request->getClientIp();
        $sessionName = $newsId.'-' . $request->getSession()->getId();
        if (!Session::exists($sessionName)) {
            //check model
            Session::put($sessionName, $newsId);
        }
        return $next($request);
    }
}
