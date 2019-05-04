<?php

namespace Halnique\Slack\WebAPI\Contracts\Endpoints;


use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;

interface Client
{
    public function request(HttpMethod $httpMethod, Uri $uri, Options $options): array;
}