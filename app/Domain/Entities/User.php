<?php

namespace App\Domain\Entities;

use App\Domain\Enums\RoleUserTypes;
use App\Domain\Traits\HasToArray;
use ArrayObject;

class User
{
    use HasToArray;

    private string $name;
    private string $lastName;
    private string $email;
    private string $password;
    /**
     * @var ArrayObject|RoleUserTypes[]
     */
    private array $roles;
    private ?User $parent = null;

    /**
     * @param string $name
     * @param string $lastName
     * @param string $email
     * @param string $password
     * @param RoleUserTypes[]|ArrayObject $roles
     * @param User|null $parent
     */
    public function __construct(
        string $name,
        string $lastName,
        string $email,
        string $password,
        array $roles,
        ?User $parent)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->roles = $roles;
        $this->parent = $parent;
    }

    public static function create(
        string $name,
        string $lastName,
        string $email,
        string $password): User
    {
        return new User($name, $lastName, $email, $password, [RoleUserTypes::GUEST], null);
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return User
     */
    public function setLastName(string $lastName): User
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     * @return User
     */
    public function setRoles(array $roles): User
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getParent(): ?User
    {
        return $this->parent;
    }

    /**
     * @param User|null $parent
     * @return User
     */
    public function setParent(?User $parent): User
    {
        $this->parent = $parent;
        return $this;
    }
}
