<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use Halnique\Slack\WebAPI\Responses;

final class UsersLookupByEmail implements \Halnique\Slack\WebAPI\Contracts\Endpoints\Api
{
    use WithAuthenticate;

    const METHOD = 'users.lookupByEmail';

    private $client;

    private $params;

    public function __construct(\Halnique\Slack\WebAPI\Contracts\Endpoints\Client $client, string $email)
    {
        $this->params = [
            'email' => $email,
        ];

        $this->client = $client;
    }

    public function call(): Responses\UsersLookupByEmail
    {
        return new Responses\UsersLookupByEmail($this->client->request(
            $this->httpMethod(),
            $this->uri(),
            $this->options()
        ));
    }

    public function httpMethod(): HttpMethod
    {
        return HttpMethod::get();
    }

    public function uri(): Uri
    {
        return Uri::of($this->httpMethod(), self::METHOD, $this->params);
    }

    public function options(): Options
    {
        return Options::of($this->httpMethod(), $this->params(), $this->token());
    }

    public function params(): array
    {
        return $this->params;
    }
}