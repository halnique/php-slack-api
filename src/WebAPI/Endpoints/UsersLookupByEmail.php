<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use Halnique\Slack\WebAPI\Responses;

final class UsersLookupByEmail implements \Halnique\Slack\WebAPI\Contracts\Endpoints\Api
{
    use WithAuthenticate;

    private const METHOD = 'users.lookupByEmail';

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
        return new Uri($this->httpMethod(), self::METHOD, $this->params);
    }

    public function options(): Options
    {
        return new Options($this->httpMethod(), $this->params, $this->token());
    }
}