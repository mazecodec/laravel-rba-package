<?php

namespace App\Services\Auth;

use App\Exceptions\ForgotPasswordException;
use Illuminate\Support\Facades\Password;

class ForgotPasswordService
{
    /**
     * @param string $email
     * @return void
     * @throws ForgotPasswordException
     */
    public function __invoke(string $email): void
    {
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink([$email]);

        if ($status != Password::RESET_LINK_SENT) {
            throw new ForgotPasswordException(__($status));
        }

        session()->flash('status', __($status));

    }

}
