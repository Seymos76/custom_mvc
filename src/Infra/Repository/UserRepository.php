<?php


namespace App\Infra\Repository;


use App\Config\Database;
use App\Core\Entity\User;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class UserRepository extends EntityRepository
{
    protected SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer, EntityManagerInterface $manager)
    {
        parent::__construct($manager);
        $this->serializer = $serializer;
    }

    public function save(User $user): bool
    {
        $pdo = Database::getConnexion();
        $query = $pdo->prepare("INSERT INTO users (email, password, roles, registered_at, api_token) VALUES (:email, :password, :roles, :registered_at, :api_token)");
        $serializer = $this->getSerializer();
        $serialized = $serializer->serialize($user->roles, 'json');
//        dump($query);
//        dump($serialized);
//        dump($user);
        try {
            $query->execute([
                'email' => $user->email,
                'password' => $user->password,
                'roles' => $serialized,
                'registered_at' => $user->registeredAt->format('d-m-Y'),
                'api_token' => $user->apiToken
            ]);
            return true;
        } catch (\Exception $exception) {
            throw new Exception("L'insertion de l'utilisateur a échoué: ", $exception->getMessage());
        }
    }

    public function getByEmail(string $email)
    {
        $pdo = Database::getConnexion();
        $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(['email' => $email]);
        return $query->fetch(\PDO::FETCH_OBJ);
    }

    public function serializeData(array $data)
    {
        try {
            $serialized = $this->serializer->serialize($data, 'json');
        } catch (\Exception $exception) {
            throw new \Exception('Un problème est survenu lors de la sérialisation des données');
        }
        return $serialized;
    }

    private function getSerializer(): SerializerInterface
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        return new Serializer($normalizers, $encoders);
    }
}