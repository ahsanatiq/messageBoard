<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class RedirectIfFirstLogin
{
    protected $auth;
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()) {
            if(!$this->auth->user()->first_login) {
                return redirect()->route('profile.password');
            }
        }
        return $next($request);
    }
}
