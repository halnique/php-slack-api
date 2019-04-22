<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\Client;
use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;
use Halnique\Slack\WebAPI\Endpoints\WithAuthenticate;
use HalniqueTest\Slack\Mock\GuzzleException;
use HalniqueTest\Slack\Mock\GuzzleHttpClient;
use HalniqueTest\Slack\TestCase;

class ClientTest extends TestCase
{
    use WithAuthenticate;

    public function test__construct()
    {
        $client = new Client(new GuzzleHttpClient());
        $this->assertInstanceOf(Client::class, $client);
    }

    public function testRequest()
    {
        $httpMethod = HttpMethod::get();
        $faker = \Faker\Factory::create();

        $params = [];
        foreach ($faker->words as $word) {
            $params[$faker->word] = $word;
        }

        $client = new Client(new GuzzleHttpClient());
        $response = $client->request(
            $httpMethod,
            Uri::of($httpMethod, $faker->word, $params),
            Options::of($httpMethod, $params, $this->token())
        );
        $this->assertArrayHasKey('ok', $response);
        $this->assertArrayHasKey('error', $response);

        $guzzleClient = new GuzzleHttpClient();
        $guzzleClient->request = function () {
            throw new GuzzleException();
        };
        $client = new Client($guzzleClient);
        $response = $client->request(
            $httpMethod,
            Uri::of($httpMethod, $faker->word, $params),
            Options::of($httpMethod, $params, $this->token())
        );
        $this->assertArrayHasKey('ok', $response);
        $this->assertArrayHasKey('error', $response);
    }
}
