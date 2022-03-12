<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidAdminOrUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
        
            if (session('role') == 'admin' || session('role') == 'userr') {
                return $next($request);
            } else{
                return redirect()->route('error');
            }
        }
    }