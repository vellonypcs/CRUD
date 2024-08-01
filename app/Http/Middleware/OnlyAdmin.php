<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyAdmin
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
        // disini kita ngasih tau apa yang harus dilakukan akun yang lagi login bukan admin
        if(Auth::user()->role_id != 1) {
            return redirect('/');
        }

        // apa yang middleware lakukan kalau akun yang login adalah admin?
        return $next($request);
    }
}
