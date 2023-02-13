<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Petugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->akses == 'petugas'){
            return $next($request);
        }
        abort(403, 'Akses khusus petugas');
    }
}
