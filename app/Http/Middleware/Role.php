<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{

    public function handle(Request $request, Closure $next, $routeRoles)
    {
        if (!auth()->check()) {
            return redirect('/');
        }else{
            $nameArray = explode('|', $routeRoles);
            $roleName = auth()->user()->role;
        }
        if (!in_array($roleName,$nameArray)) {
            abort(403,'NO PERMISSION');
        }
        return $next($request);
    }
}
