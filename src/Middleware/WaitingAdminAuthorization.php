<?php

namespace Riley\AdminApprover\Middleware;

use Closure;
use Illuminate\Http\Request;

class WaitingAdminAuthorization
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->isApproved()) {
            return redirect(config('admin-approver.waiting_route'));
        }

        return $next($request);
    }
}
