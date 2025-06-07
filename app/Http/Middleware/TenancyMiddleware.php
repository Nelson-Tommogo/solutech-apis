<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Organization;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TenantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $slug = $request->route('organization') ?? 
               explode('.', $request->getHost())[0];

        $organization = Organization::where('slug', $slug)->first();

        if (!$organization) {
            throw new NotFoundHttpException('Organization not found');
        }

        app()->instance('currentOrganization', $organization);
                
        return $next($request);
    }
}