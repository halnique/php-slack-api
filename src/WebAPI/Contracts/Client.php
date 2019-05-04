<?php

namespace Halnique\Slack\WebAPI\Contracts;


use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Responses;
use Halnique\Slack\WebAPI\Responses\Response;

interface Client
{
    public function call(HttpMethod $httpMethod, string $method, array $params = []): Responses\Response;
}