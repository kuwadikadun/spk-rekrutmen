<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticatePegawai
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('pegawai')->guest()) {
            return redirect()->route('login_pegawai'); // Ganti dengan rute login pegawai
        }

        return $next($request);
    }
}

