<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use Halnique\Slack\WebAPI\Responses;

class ApiTest implements \Halnique\Slack\WebAPI\Contracts\Endpoints\Api
{
    private const METHOD = 'api.test';

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
        return new Uri($this->httpMethod(), self::METHOD);
    }

    public function options(): Options
    {
        return new Options($this->httpMethod());
    }
}