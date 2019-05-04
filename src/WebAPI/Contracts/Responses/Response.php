<?php

namespace Halnique\Slack\WebAPI\Contracts\Responses;


use Halnique\Slack\WebAPI\Contracts\ValueObject;

interface Response extends ValueObject
{
    public function __get(string $name);
}