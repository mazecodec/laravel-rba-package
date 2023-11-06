<?php

namespace App\Domain\Entities;

class AuthApi
{
    private string $token;
    private User $user;

    /**
     * @param string $token
     * @param User $user
     */
    public function __construct(string $token, User $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    public static function create(
        string $token,
        User $user
    ) : AuthApi {
        return new AuthApi($token, $user);
    }


    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return AuthApi
     */
    public function setToken(string $token): AuthApi
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return AuthApi
     */
    public function setUser(User $user): AuthApi
    {
        $this->user = $user;
        return $this;
    }

}
