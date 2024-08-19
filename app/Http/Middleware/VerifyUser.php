<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::user() &&  Auth::user()->Verified == 1) {
            //         return $next($request);
            //     }
            //     return redirect('home')->with('error','You have not Verified access');
// }

    if (!$request->user()) {
        return redirect('/login')->with('error', 'You need to be logged in.');
    }

    return $next($request);
}
}

