<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class AuthenticateAdminRole
{
    protected $auth;
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->role && $this->auth->user()->role->name!='Admin') {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
