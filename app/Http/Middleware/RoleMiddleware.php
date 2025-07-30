<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = auth()->user();
        $userRole = $user->role;
        
        // Support multiple roles separated by comma
        $allowedRoles = array_map('trim', explode(',', $role));
        
        // Check if user has any of the allowed roles
        if (in_array($userRole, $allowedRoles)) {
            return $next($request);
        }

        // Log unauthorized access attempt
        \Log::warning('Unauthorized access attempt', [
            'user_id' => $user->id,
            'user_role' => $userRole,
            'required_roles' => $allowedRoles,
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
        ]);

        // Return appropriate response based on request type
        if ($request->expectsJson()) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Anda tidak memiliki akses ke fitur ini.'
            ], 403);
        }

        // For web requests, redirect with error message
        return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
