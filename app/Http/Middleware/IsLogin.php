<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->is_login) {
            return $next($request);
        } else {
            if ($request->wantsJson()) {
                return response()->json(["message" => "Akun sudah dilogout!"], 401);
            } else {
                Auth::logout();
                return redirect()->route("welcome")->withErrors(["is_login" => "Akun sudah dilogout!"]);
            }
        }
    }
}
