<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Halnique\Slack\WebAPI\Contracts;

final class Client implements Contracts\Endpoints\Client
{
    const UNKNOWN_ERROR = 'unknown_error';

    private $client;

    private function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public static function of(ClientInterface $client): self
    {
        return new self($client);
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
                    'error' => self::UNKNOWN_ERROR,
                ];
            }
        } catch (GuzzleException | \Throwable $exception) {
            $response = [
                'ok' => false,
                'error' => $exception->getMessage(),
            ];
        }

        return $response;
    }
}