<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ScopeAdminToOrganization
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->route('organization')) {
            if ($request->user()->organization_id !== $request->route('organization')->id) {
                abort(403, 'Unauthorized');
            }
        }

        return $next($request);
    }
}