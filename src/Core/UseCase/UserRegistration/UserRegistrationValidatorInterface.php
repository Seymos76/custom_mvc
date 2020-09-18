<?php


namespace App\Core\UseCase\UserRegistration;


interface UserRegistrationValidatorInterface
{
    public function validate(): bool;

    public function getUser(): array;
}