<?php

// UserMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isUser()) {
            return $next($request);
        }
        
        abort(403, 'Unauthorized');
    }
}
