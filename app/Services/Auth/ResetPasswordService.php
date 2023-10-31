<?php

namespace App\Services\Auth;

use App\Exceptions\ResetPasswordException;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordService
{
    /**
     * @param string $email
     * @param string $password
     * @param string $passwordConfirmation
     * @param string $token
     * @return void
     * @throws ResetPasswordException
     */
    public function __invoke(string $email, string $password, string $passwordConfirmation, string $token): void
    {
        $credentials = [
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $passwordConfirmation,
            'token' => $token,
        ];

        $hashPasswordService = new HashPasswordService();
        $passwordHash = $hashPasswordService($password);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $credentials,
            function ($user) use ($passwordHash) {
                $user->forceFill([
                    'password' => $passwordHash,
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PASSWORD_RESET) {
            throw new ResetPasswordException(__($status));
        }

        session()->flash('status', __($status));
    }
}
