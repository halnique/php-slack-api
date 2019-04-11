<?php

namespace Halnique\Slack\WebAPI;


use Dotenv\Dotenv;

class Client implements Contracts\Client
{
    private $client;

    public function __construct(Contracts\Endpoints\Client $client)
    {
        $this->client = $client;

        $dotEnv = Dotenv::create(__DIR__ . '/../../');
        $dotEnv->load();
    }

    public static function create(): self
    {
        return new self(new Endpoints\Client(new \GuzzleHttp\Client()));
    }

    public function oauthAccess(string $clientId, string $clientSecret, string $code): Responses\OauthAccess
    {
        return (new Endpoints\OauthAccess($this->client, $clientId, $clientSecret, $code))->call();
    }

    public function authTest(): Responses\AuthTest
    {
        return (new Endpoints\AuthTest($this->client))->call();
    }

    public function apiTest(): Responses\ApiTest
    {
        return (new Endpoints\ApiTest($this->client))->call();
    }

    public function usersLookupByEmail(string $email): Responses\UsersLookupByEmail
    {
        return (new Endpoints\UsersLookupByEmail($this->client, $email))->call();
    }
}