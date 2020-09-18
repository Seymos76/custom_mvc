<?php


namespace API;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class LoginControllerTest extends WebTestCase
{

    public function testLogin()
    {
        $client = static::createClient();
        $client->request('POST', '/api/login');
        $this->assertEquals(Response::HTTP_ACCEPTED, $client->getResponse()->getStatusCode());
//        $response = $this->client->request('POST', 'http://127.0.0.1:9000/api/login', [
//            'headers' => [
//                'Accept' => 'application/json',
//                'X-Auth-Token' => ''
//            ]
//        ]);
//        $content = $response->getContent();
//        dump($content);
    }
}