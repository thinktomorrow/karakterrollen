<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class RemoveIndexPhpFromUrl {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( ! Str::startsWith($request->getRequestUri(), '/index.php')) return $next($request);

        $url = str_replace('/index.php','', $request->fullUrl());

        return redirect()->to( $url , 301);
    }

}
