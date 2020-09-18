<?php


namespace App\Core\UseCase\UserLogin;


use App\Core\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenAuthenticator
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function supports(Request $request)
    {
        return $request->headers->has('X-Auth-Token');
    }

    public function getCredentials(Request $request)
    {
        return $request->headers->get('X-Auth-Token');
    }

    public function getUser(array $credentials)
    {
        if (null === $credentials) {
            return null;
        }

        return $this->entityManager->getRepository(User::class)
            ->findOneBy(['apiToken' => $credentials])
            ;
    }

    public function checkCredentials($credentials)
    {
        // make sure the password is valid
        // In case of API token, no credential check is needed
        return true;
    }

    public function onAuthenticationSuccess(Request $request)
    {
        return null;
    }

    public function onAuthenticationFailure(Request $request)
    {
        return new JsonResponse(['message' => "Authentication failed"], Response::HTTP_UNAUTHORIZED);
    }

    public function supportsRememberMe()
    {
        return false;
    }

}