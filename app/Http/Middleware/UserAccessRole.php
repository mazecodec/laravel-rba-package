<?php

namespace App\Http\Middleware;

use App\Domain\Enums\RoleUserTypes;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccessRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (\Illuminate\Http\Response|RedirectResponse) $next
     * @param RoleUserTypes $userType
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, RoleUserTypes $userType)
    {
        var_dump($userType);

        if (auth()->user()->type == $userType) {
            return $next($request);
        }

//        return response()->json(['You do not have permission to access for this page.']);
        return response()->view('errors.check-permission');
    }
}
