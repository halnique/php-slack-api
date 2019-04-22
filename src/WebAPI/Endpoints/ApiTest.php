<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use Halnique\Slack\WebAPI\Responses;

class ApiTest implements \Halnique\Slack\WebAPI\Contracts\Endpoints\Api
{
    const METHOD = 'api.test';

    private $client;

    public function __construct(\Halnique\Slack\WebAPI\Contracts\Endpoints\Client $client)
    {
        $this->client = $client;
    }

    public function call(): Responses\ApiTest
    {
        return new Responses\ApiTest($this->client->request(
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
        return Uri::of($this->httpMethod(), self::METHOD);
    }

    public function options(): Options
    {
        return Options::of($this->httpMethod(), $this->params());
    }

    public function params(): array
    {
        return [];
    }
}