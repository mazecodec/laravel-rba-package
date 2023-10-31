<?php

namespace App\Services\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginService
{
    /**
     * @param string $email
     * @param string $password
     * @param bool $remember
     * @return void
     * @throws ValidationException
     */
    public function __invoke(string $email, string $password, bool $remember = false): void
    {
        $credentials = [
          'email' => $email,
          'password' => $password,
        ];

        $this->ensureIsNotRateLimited($email);

        if (!auth()->attempt($credentials, $remember)) {
            RateLimiter::hit($this->throttleKey($email));

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey($email));

        session()->regenerate();
    }

    /**
     * @throws ValidationException
     */
    protected function ensureIsNotRateLimited($email): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey($email), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * @param string $email
     * @return string
     */
    protected function throttleKey(string $email): string
    {
        return Str::transliterate(Str::lower($email) . '|' . request()->ip());
    }
}
