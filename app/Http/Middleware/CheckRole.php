<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles (Ini adalah role yang diizinkan)
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek jika user sudah login DAN rolenya ada di dalam daftar $roles
        if (! $request->user() || ! in_array($request->user()->role, $roles)) {

            // Jika tidak, tolak akses
            abort(403, 'AKSES DITOLAK. ANDA TIDAK MEMILIKI WEWENANG.');
        }

        // Jika lolos, lanjutkan request
        return $next($request);
    }
}
