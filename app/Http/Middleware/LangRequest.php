<?php

namespace App\Http\Middleware;

use Closure;

class LangRequest
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

        $lang = 'en';

        if ($request->headers->has('Accept-Language') && (in_array($request->header('Accept-Language'), ['es', 'en']))) {
            $lang = $request->header('Accept-Language');
        }

        app()->setLocale($lang);

        return $next($request);
    }
}
