<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InactivityTimeout
{
    protected $timeout = 600; // 10 minutos en segundos

    public function handle($request, Closure $next)
    {
        $lastActivity = Session::get('last_activity');

        if ($lastActivity && time() - $lastActivity > $this->timeout) {
            Auth::logout();
            return redirect('/login');
        }

        Session::put('last_activity', time());

        return $next($request);
    }
}
