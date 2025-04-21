<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class typeAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $type)
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->type !== $type) {
                return redirect()->route('home')->with('error', 'Akses ditolak! Akun Anda tidak memiliki izin.');
            }
        }

        return $next($request);
    }
}
