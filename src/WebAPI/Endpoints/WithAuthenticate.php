<?php

namespace Halnique\Slack\WebAPI\Endpoints;


trait WithAuthenticate
{
    public function token(): string
    {
        $token = getenv('SLACK_API_ACCESS_TOKEN');

        if (!$token) {
            throw new \RuntimeException('Require Slack Api Access Token to set env: SLACK_API_ACCESS_TOKEN');
        }

        return $token;
    }
}