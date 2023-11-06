<?php

namespace App\Services\User;

use App\Domain\Interfaces\User\RegisterNewUser;
use App\Models\User;

class RegisterUser
{
    private RegisterNewUser $register;

    public function __construct(RegisterNewUser $register)
    {
//        $gateway = app(PaymentGatewayInterface::class)->get('paypal');
        $this->register = $register;
    }

    public function register(User $user): ?User
    {
        $userDto = $this->register->registerNewUser($user);

        if ($userDto === null) {
            return null;
        }

        $user->fill($userDto->toArray());
        $user->save();

        return $user;
    }
}
