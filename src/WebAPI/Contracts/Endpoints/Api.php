<?php

namespace Halnique\Slack\WebAPI\Contracts\Endpoints;


use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;

interface Api
{
    public function call();

    public function httpMethod(): HttpMethod;

    public function uri(): Uri;

    public function options(): Options;

    public function params(): array;
}