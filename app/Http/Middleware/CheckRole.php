<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // app/Http/Middleware/CheckRole.php

    public function handle($request, Closure $next)
    {
        $role = Session::get('role');

        if ($role == 1) {
            return redirect('/admin');
        } elseif ($role == 2) {
            return $next($request);
        }

        // Handle other cases as per your requirements, such as redirecting to login
    }

}
