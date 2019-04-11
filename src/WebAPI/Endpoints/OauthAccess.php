<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use Halnique\Slack\WebAPI\Responses;

class OauthAccess implements \Halnique\Slack\WebAPI\Contracts\Endpoints\Api
{
    private const METHOD = 'oauth.access';

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
        return new Uri($this->httpMethod(), self::METHOD, $this->params);
    }

    public function options(): Options
    {
        return new Options($this->httpMethod(), $this->params);
    }
}