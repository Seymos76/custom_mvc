<?php


namespace App\Infra\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package App\Infra\Entity
 * @ORM\Entity(repositoryClass="App\Infra\Repository\UserRepository")
 */
class User
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
}