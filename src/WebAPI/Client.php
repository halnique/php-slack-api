<?php

namespace Halnique\Slack\WebAPI;


use Dotenv\Dotenv;
use GuzzleHttp;
use Halnique\Slack\WebAPI\Endpoints\HttpMethod;

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
        return new self(Endpoints\Client::of(new GuzzleHttp\Client()));
    }

    public function call(HttpMethod $httpMethod, string $method, array $params = []): Responses\Response
    {
        return (Endpoints\Api::of($this->client, $httpMethod, $method, $params))->call();
    }
}