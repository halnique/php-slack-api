<?php


namespace HalniqueTest\Slack\WebAPI\Endpoints;


use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;

class Client implements \Halnique\Slack\WebAPI\Contracts\Endpoints\Client
{
    public $response = [];

    public function request(HttpMethod $httpMethod, Uri $uri, Options $options): array
    {
        return $this->response;
    }
}