<?php

namespace Riley\AdminApprover\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthorizedCompleted
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->isApproved()) {
            return redirect(config('admin-approver.home'));
        }

        return $next($request);
    }
}
