<?php

namespace Halnique\Slack\WebAPI\Contracts\Endpoints;


use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;

interface Api
{
    public function call();

    public function uri(): Uri;

    public function options(): Options;
}