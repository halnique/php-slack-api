<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use Halnique\Slack\WebAPI\Contracts;
use Halnique\Slack\WebAPI\Responses;

final class Api implements Contracts\Endpoints\Api
{
    use WithAuthenticate;

    private $client;

    private $httpMethod;

    private $method;

    private $params = [];

    private function __construct(
        Contracts\Endpoints\Client $client,
        HttpMethod $httpMethod,
        string $method,
        array $params
    ) {
        $this->client = $client;
        $this->httpMethod = $httpMethod;
        $this->method = $method;
        $this->params = $params;
    }

    public static function of(
        Contracts\Endpoints\Client $client,
        HttpMethod $httpMethod,
        string $method,
        array $params = []
    ) {
        return new self($client, $httpMethod, $method, $params);
    }

    public function call(): Responses\Response
    {
        return Responses\Response::of($this->client->request(
            $this->httpMethod,
            $this->uri(),
            $this->options()
        ));
    }

    public function uri(): Uri
    {
        return Uri::of($this->httpMethod, $this->method, $this->params);
    }

    public function options(): Options
    {
        return Options::of($this->httpMethod, $this->params, $this->token());
    }
}