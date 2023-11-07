<?php

namespace Mazecodec\LaravelRbaCheck\Http\Middlewares;

use App\Domain\Enums\RoleUserTypes;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RBACheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (\Illuminate\Http\Response|RedirectResponse) $next
     * @param array $roles
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, array ...$roles)
    {
        if (auth()->check()) {
            $user = $request->user();

            foreach($roles as $role) {
                if($user->hasRole($role)) {
                    return $next($request);
                }
            }
        }

        abort('403', 'You are not allowed to access this resource.');
    }
}
