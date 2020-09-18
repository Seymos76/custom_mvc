<?php


namespace API;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Serializer\Serializer;

class RegistrationControllerTest extends WebTestCase
{
    public function testRegister()
    {
        $client = static::createClient();
        $credentials = [
            'email' => "john@doe.fr",
            'password' => "password"
        ];
        $client->getRequest()->headers->add(['Content-Type' => 'application/json']);
//        $credentials = $serializer->serialize($credentials, 'json');

        $client->request('POST', '/api/register', [], [], [], $credentials);
        self::assertEquals(201, $client->getResponse()->getStatusCode());
    }
}