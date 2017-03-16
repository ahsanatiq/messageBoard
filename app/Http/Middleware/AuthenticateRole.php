<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class AuthenticateRole
{
    protected $auth;
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->role && $this->auth->user()->role->name!='Super Admin') {
            return abort(401, 'Un-Authorized Access. Not allowed.');
        }
        return $next($request);
    }
}
