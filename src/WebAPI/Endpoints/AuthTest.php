<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use Halnique\Slack\WebAPI\Responses;

class AuthTest implements \Halnique\Slack\WebAPI\Contracts\Endpoints\Api
{
    use WithAuthenticate;

    private const METHOD = 'auth.test';

    private $client;

    public function __construct(\Halnique\Slack\WebAPI\Contracts\Endpoints\Client $client)
    {
        $this->client = $client;
    }

    public function call(): Responses\AuthTest
    {
        return new Responses\AuthTest($this->client->request(
            $this->httpMethod(),
            $this->uri(),
            $this->options()
        ));
    }

    public function httpMethod(): HttpMethod
    {
        return HttpMethod::post();
    }

    public function uri(): Uri
    {
        return new Uri($this->httpMethod(), self::METHOD);
    }

    public function options(): Options
    {
        return new Options($this->httpMethod(), [], $this->token());
    }
}