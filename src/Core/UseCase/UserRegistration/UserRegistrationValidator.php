<?php


namespace App\Core\UseCase\UserRegistration;


class UserRegistrationValidator implements UserRegistrationValidatorInterface
{
    protected array $user;

    public function __construct(array $user)
    {
        $this->user = $user;
    }

    public function validate(): bool
    {
        if (!$this->isEmailValid($this->user['email'])) {
            throw new \Exception("Cet email n'est pas valide.");
        }
        if (!$this->isPasswordValid($this->user['password'])) {
            throw new \Exception("Ce mot de passe n'est pas valide.");
        }
        return true;
    }

    protected function isEmailValid(string $email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    protected function isPasswordValid(string $password): bool
    {
        return strlen($password) > 10;
    }

    /**
     * @return array
     */
    public function getUser(): array
    {
        return $this->user;
    }
}