<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Enums\RoleUserTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     * @throws AuthorizationException
     */
    public function store(RegisterRequest $request)
    {
        $this->authorize('store', User::class);

        $request->validated();

        $user = User::create(
            $request->safe()
                    ->only([
                        'name',
                        'last_name',
                        'email',
                        'password',
                        'role'
                    ])
        );

        event(new Registered($user));

        return redirect().route('users');
    }

    /**
     * Display the registration view.
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('create', User::class);

        return view('auth.register', [
            'roles' => RoleUserTypes::toObject()
        ]);
    }
}
