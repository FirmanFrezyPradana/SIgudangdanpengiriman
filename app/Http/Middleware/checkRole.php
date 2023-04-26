<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$Rules)
    {
        if (in_array($request->user()->Rule, $Rules)) {
            return $next($request);
        }
        if (Auth::user()->Rule == '1') {
            return Redirect::to('admin.dashboard');
        } elseif (Auth::user()->Rule == '2') {
            return Redirect::to('gudang.dashboard');
        }
    }
}
