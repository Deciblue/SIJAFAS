<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        // CHECK AUTH FIRST
        if (!$request->user()) {
            return redirect('/login');
        }

        // CHECK ROLE RELATION SAFELY
        $userRole = $request->user()->role?->name;

        if (!$userRole) {
            abort(403, 'Role tidak terdefinisi');
        }

        // COMPARE ROLE
        if ($userRole !== $role) {
            abort(403, 'Forbidden - akses ditolak');
        }

        return $next($request);
    }
}