<?php

namespace App\Http\Middleware;

use App\Models\Organization;
use Closure;
use Illuminate\Http\Request;

class TenancyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $slug = $request->route('organization') ?? explode('.', $request->getHost())[0];
        
        if ($organization = Organization::where('slug', $slug)->first()) {
            $request->merge(['organization' => $organization]);
            $request->setUserResolver(function () use ($organization) {
                return $organization;
            });
            
            return $next($request);
        }

        abort(404, 'Organization not found');
    }
}