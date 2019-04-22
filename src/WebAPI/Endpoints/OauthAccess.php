<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use Halnique\Slack\WebAPI\Responses;

class OauthAccess implements \Halnique\Slack\WebAPI\Contracts\Endpoints\Api
{
    const METHOD = 'oauth.access';

    private $client;

    private $params;

    public function __construct(
        \Halnique\Slack\WebAPI\Contracts\Endpoints\Client $client,
        string $clientId,
        string $clientSecret,
        string $code
    ) {
        $this->params = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'code' => $code,
        ];

        $this->client = $client;
    }

    public function call(): Responses\OauthAccess
    {
        return new Responses\OauthAccess($this->client->request(
            $this->httpMethod(),
            $this->uri(),
            $this->options()
        ));
    }

    public function httpMethod(): HttpMethod
    {
        return HttpMethod::get();
    }

    public function uri(): Uri
    {
        return Uri::of($this->httpMethod(), self::METHOD, $this->params);
    }

    public function options(): Options
    {
        return Options::of($this->httpMethod(), $this->params());
    }

    public function params(): array
    {
        return $this->params;
    }
}