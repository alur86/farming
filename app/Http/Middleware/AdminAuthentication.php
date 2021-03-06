<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

/**
middleware to validation of user status
*/


class AdminAuthentication
{

public function handle($request, Closure $next){
        
protected $auth;

public function __construct(Guard $auth) {

$this->auth = $auth;


}

public function handle($request, Closure $next) {


if ($this->auth->check())

{

if ($this->auth->user()->is_admin == true)

{

return $next($request);

}

}

return new RedirectResponse(url('/'));

}






}
