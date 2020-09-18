<?php


namespace App\Core\UseCase\UserLogin;


interface UserLoginValidatorInterface
{
    public function isEmailValid(): bool;

    public function isPasswordValid(): bool;

}