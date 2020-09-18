<?php


namespace App\API;


use App\Core\Checker\RequestChecker;
use App\Core\Entity\User;
use App\Core\UseCase\UserRegistration\UserBuilder;
use App\Infra\EntityManager\EntityManager;
use App\Infra\Repository\UserRepository;
use App\Core\UseCase\UserLogin\UserLoginValidator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;

class LoginController
{
    public function login(Request $request)
    {
        $requestChecker = new RequestChecker($request);
        try {
            $requestChecker->supports("POST");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        $validator = new UserLoginValidator($requestChecker->extract());
        try {
            $valid = $validator->validate();
//            dump($valid);
        } catch (\Exception $exception) {
            return new Response('Erreur durant la validation des identifiants: '.$exception->getMessage(), 200, []);
        }

        $manager = new EntityManager();
        $repository = new UserRepository(new Serializer(), $manager);
        try {
            $user = $repository->getByEmail($validator->getUser()['email']);
            dump('array user',$user);
        } catch (\Exception $exception) {
            return new JsonResponse([$exception->getMessage()], 500, [], true);
        }

        $hydrator = new UserBuilder($validator);
        dump($hydrator);
        try {
            $newUser = $hydrator->hydrate($user);
            dump('hydrated user',$newUser);
        } catch (\Exception $exception) {
            echo "Une erreur est survenue à l'hydratation de l'utilisateur: ".$exception->getMessage();
        }
        if (!$newUser instanceof User) {
            return new JsonResponse(["message" => "Aucun utilisateur pour cette adresse email"], Response::HTTP_NOT_FOUND, [], false);
        }
        $data = [
            'message' => "User found !",
            'user' => $newUser
        ];
        $serializer = new Serializer();
        $serialized = $serializer->serialize($data, 'json');
        return new JsonResponse($serialized, Response::HTTP_FOUND, [], true);
    }
}