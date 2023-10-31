<?php

namespace App\Services\Auth;

class SendVerificationService
{
    public function __invoke(): bool
    {
        if (auth()->user()->hasVerifiedEmail()) {
          return false;
        }

        auth()->user()->sendEmailVerificationNotification();

        return true;
    }

}
