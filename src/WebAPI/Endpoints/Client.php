<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use GuzzleHttp\ClientInterface;
use Halnique\Slack\WebAPI\Responses\Error;

final class Client implements \Halnique\Slack\WebAPI\Contracts\Endpoints\Client
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function request(HttpMethod $httpMethod, Uri $uri, Options $options): array
    {
        try {
            $response = $this->client->request(
                $httpMethod->value(),
                $uri->value(),
                $options->value()
            );

            $response = json_decode($response->getBody(), true);

            if (!$response) {
                $response = [
                    'ok' => false,
                    'error' => Error::FATAL_ERROR,
                ];
            }
        } catch (\GuzzleHttp\Exception\GuzzleException | \Throwable $exception) {
            $response = [
                'ok' => false,
                'error' => $exception->getMessage(),
            ];
        }

        return $response;
    }
}