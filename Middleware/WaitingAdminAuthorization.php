<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WaitingAdminAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loginUser = User::findOrFail(auth()->user()->id);
        if ($loginUser->admin_approved_at){
            return $next($request);
        }
        return redirect('/waiting-admin-approve');
    }
}
