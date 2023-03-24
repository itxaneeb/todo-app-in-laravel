<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Middleware\Auth;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $user): Response
    { 
        $role = auth()->user()->role;
        // dd($role);
        // dd($request);

        if ($role == $user) {
            return $next($request);
        }

        if ($role == 'admin') {
            return redirect('/');
        } 
        else {
            return redirect('/');
        }
        
    
}
}
