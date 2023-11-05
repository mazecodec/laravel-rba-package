<?php

namespace App\Http\Middleware;

use App\Domain\Enums\RoleUserTypes;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserAccessRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @param string $role
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $hasRole = $request->user()->roles->contains(function ($userRole) use ($role) {
            return RoleUserTypes::tryFrom($userRole->name) === RoleUserTypes::tryFrom($role);
        });

        if ($hasRole) {
            return $next($request);
        }

        abort('403', 'You are not allowed to access this resource.');
    }
}
