<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'web')
    {
        if (Auth::user()->hasRole('super-admin')||Auth::user()->hasPermissionTo($request->route()->action['as'])) {
            return $next($request);
        }
        throw UnauthorizedException::forPermissions([$request->route()->action['as']]);
    }
}
