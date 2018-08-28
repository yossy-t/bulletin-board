<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        /*
         * HaruReview
         * ここは、if ($request->session()->has("oauth_token")) { で良いかと。
         * 1行減らせます。
         */
        $twitterLogin = $request->session()->has("oauth_token");
        if ($twitterLogin) {
            return $next($request);
        }
        return redirect("/");
    }
}
