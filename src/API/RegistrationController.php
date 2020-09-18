<?php


namespace App\API;


use App\Core\Checker\RequestChecker;
use App\Core\UseCase\UserRegistration\UserBuilder;
use App\Core\UseCase\UserRegistration\UserRegistrationValidator;
use App\Infra\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;

class RegistrationController
{
    public function register(Request $request): JsonResponse
    {
        $requestChecker = new RequestChecker($request);
        try {
            $requestChecker->supports("POST");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        // get arguments from json
        $jsonUser = json_decode($request->getContent(), true);
//        dump('jsonUser',$jsonUser);
        // validate data step by step
        $validator = new UserRegistrationValidator($jsonUser);
        try {
            $validated = $validator->validate();
//            dump($validated);
        } catch (\Exception $exception) {
            echo 'Erreur durant la validation de l\'inscription: ', $exception->getMessage();
        }
        $userBuilder = new UserBuilder($validator);
        try {
            $user = $userBuilder->build();
//            dump($user);
        } catch (\Exception $exception) {
            throw new \Exception("La création de l'objet User a échouée:" .$exception->getMessage());
        }
        $repository = new UserRepository(new Serializer());
        try {
            $registrationSuccess = $repository->save($user);
//            dump($registrationSuccess);
            $data = [
                'message' => "Utilisateur enregistré"
            ];
            return new JsonResponse(json_encode($data, 'json'), Response::HTTP_CREATED, [], true);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        $data = [
            'message' => "Une erreur est survenue pendant l'inscription"
        ];
        die($data);
//        return new JsonResponse(json_encode($data, 'json'), 500, [], true);
    }
}