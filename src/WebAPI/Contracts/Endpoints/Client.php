<?php

namespace Halnique\Slack\WebAPI\Contracts\Endpoints;


use GuzzleHttp\ClientInterface;
use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;

interface Client
{
    public function __construct(ClientInterface $client);

    public function request(
        HttpMethod $httpMethod,
        Uri $uri,
        Options $options
    ): array;
}