<?php


namespace App\Core\Entity;


class User implements \Serializable
{
    public const DEFAULT_TOKEN = 'never_authenticated';

    public string $email;

    public string $password;

    public array $roles = ['ROLE_USER'];

    public string $apiToken;

    public \DateTime $registeredAt;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->apiToken = self::DEFAULT_TOKEN;
        $this->registeredAt = new \DateTime('now');
    }

    public function serialize()
    {
        return [
            'email' => $this->email,
            'roles' => $this->roles,
            'api_token' => $this->apiToken,
            'registered_at' => $this->registeredAt->format('d/m/Y')
        ];
    }

    public function unserialize($serialized)
    {
//        dump($serialized);
//        die('User serialized');
        return new self(
            $serialized['email'], $serialized['password']
        );
    }
}