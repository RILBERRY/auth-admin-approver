<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthorizedCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::findOrFail(auth()->user()->id);
        if($user->admin_approved_at){
            return redirect(config('authApprover.home'));
        }
        return $next($request);
    }
}
