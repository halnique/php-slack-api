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

    public function testRequest()
    {
        $param = $this->faker()->word;

        $guzzleClient = new GuzzleHttpClient();
        $guzzleClient->request = function () use ($param) {
            return new class($param) {
                private $param;
                public function __construct($param)
                {
                    $this->param = $param;
                }

                public function getBody()
                {
                    return json_encode([
                        'ok' => true,
                        'param' => $this->param,
                    ]);
                }
            };
        };

        $client = Client::of($guzzleClient);

        $httpMethod = $this->randomHttpMethod();
        $params = $this->randomParams();

        $response = $client->request(
            $httpMethod,
            Uri::of($httpMethod, $this->faker()->word, $params),
            Options::of($httpMethod, $params, $this->token())
        );

        $this->assertTrue($response['ok']);
        $this->assertEquals($param, $response['param']);
    }

    public function testRequest_Empty()
    {
        $client = Client::of(new GuzzleHttpClient());

        $httpMethod = $this->randomHttpMethod();
        $params = $this->randomParams();

        $response = $client->request(
            $httpMethod,
            Uri::of($httpMethod, $this->faker()->word, $params),
            Options::of($httpMethod, $params, $this->token())
        );

        $this->assertFalse($response['ok']);
        $this->assertEquals(Client::UNKNOWN_ERROR, $response['error']);
    }

    public function testRequest_Error()
    {
        $guzzleClient = new GuzzleHttpClient();
        $guzzleClient->request = function () {
            throw new GuzzleException();
        };

        $client = Client::of($guzzleClient);

        $httpMethod = $this->randomHttpMethod();
        $params = $this->randomParams();

        $response = $client->request(
            $httpMethod,
            Uri::of($httpMethod, $this->faker()->word, $params),
            Options::of($httpMethod, $params, $this->token())
        );

        $this->assertFalse($response['ok']);
        $this->assertEquals('', $response['error']);
    }

    public function testRequest_Fatal()
    {
        $guzzleClient = new GuzzleHttpClient();
        $guzzleClient->request = function () {
            throw new \Exception();
        };

        $client = Client::of($guzzleClient);

        $httpMethod = $this->randomHttpMethod();
        $params = $this->randomParams();

        $response = $client->request(
            $httpMethod,
            Uri::of($httpMethod, $this->faker()->word, $params),
            Options::of($httpMethod, $params, $this->token())
        );

        $this->assertFalse($response['ok']);
        $this->assertEquals('', $response['error']);
    }

    private function randomHttpMethod(): HttpMethod
    {
        switch ($this->faker()->randomElement([
            HttpMethod::GET,
            HttpMethod::HEAD,
            HttpMethod::POST,
            HttpMethod::PUT,
            HttpMethod::DELETE,
            HttpMethod::PATCH
        ])) {
            case HttpMethod::GET:
                return HttpMethod::get();
            case HttpMethod::HEAD:
                return HttpMethod::head();
            case HttpMethod::POST:
                return HttpMethod::post();
            case HttpMethod::PUT:
                return HttpMethod::put();
            case HttpMethod::DELETE:
                return HttpMethod::delete();
            case HttpMethod::PATCH:
                return HttpMethod::patch();
        }

        return HttpMethod::get();
    }

    private function randomParams(): array
    {
        $params = [];

        for ($i = 0; $i < $this->faker()->randomDigit; $i++) {
            $params[$this->faker()->word] = $this->faker()->word;
        }

        return $params;
    }
}
