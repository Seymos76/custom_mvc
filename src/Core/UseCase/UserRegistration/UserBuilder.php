<?php


namespace App\Core\UseCase\UserRegistration;


use App\Core\Entity\User;

class UserBuilder
{
    protected UserRegistrationValidatorInterface $validator;

    public function __construct(UserRegistrationValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function build(): User
    {
        return new User($this->validator->getUser()['email'], $this->validator->getUser()['password']);
    }

    public function hydrate(array $user)
    {
        dump($user);
        $hydratedUser = new User($user['email'], $user['password']);
        $hydratedUser->registeredAt = $user['registered_at'];
        $hydratedUser->roles = $user['roles'];
        $hydratedUser->apiToken = $user['api_token'];
        die('here');
        return $hydratedUser;
    }
}