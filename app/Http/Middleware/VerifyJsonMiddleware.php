<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\HttpException;

class VerifyJsonMiddleware
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
        $header = $request->headers->get('Content-Type');

        if($header != 'application/json'){
            return response()->json(['status' => 'Not Acceptable'],403);
        }
        return $next($request);
    }
}
