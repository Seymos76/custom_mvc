<?php


namespace App\Core\UseCase\UserRegistration;


use App\Core\Entity\User;
use App\Infra\Repository\UserRepository;

class UserRegistration
{
    protected UserRegistrationValidatorInterface $validator;
    protected UserRepository $repository;

    public function __construct(UserRegistrationValidatorInterface $validator, UserRepository $repository)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }
    public function register(User $user): User
    {
        try {
            $this->repository->save($user);
            return $user;
        } catch (\Exception $exception) {
            throw new \Exception("Une erreur est survenue à l'ajout de l'utilisateur en base de données: ", $exception->getMessage());
        }
    }
}