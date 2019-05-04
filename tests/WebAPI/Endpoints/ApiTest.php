<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\Api;
use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;
use Halnique\Slack\WebAPI\Endpoints\WithAuthenticate;
use Halnique\Slack\WebAPI\Responses\Response;
use HalniqueTest\Slack\TestCase;

class ApiTest extends TestCase
{
    use WithAuthenticate;

    /** @var Api */
    private $api;

    /** @var HttpMethod */
    private $httpMethod;

    private $method;

    private $params = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->api = $this->makeApi();
    }

    public function testCall()
    {
        $this->assertInstanceOf(Response::class, $this->api->call());
    }

    public function testUri()
    {
        $this->assertTrue($this->api->uri()->equals(Uri::of($this->httpMethod, $this->method, $this->params)));
    }

    public function testOptions()
    {
        $this->assertTrue($this->api->options()->equals(Options::of($this->httpMethod, $this->params, $this->token())));
    }

    private function makeApi(): Api
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
                $this->httpMethod = HttpMethod::get();
                break;
            case HttpMethod::HEAD:
                $this->httpMethod = HttpMethod::head();
                break;
            case HttpMethod::POST:
                $this->httpMethod = HttpMethod::post();
                break;
            case HttpMethod::PUT:
                $this->httpMethod = HttpMethod::put();
                break;
            case HttpMethod::DELETE:
                $this->httpMethod = HttpMethod::delete();
                break;
            case HttpMethod::PATCH:
                $this->httpMethod = HttpMethod::patch();
                break;
        }

        $this->method = $this->faker()->word;

        for ($i = 0; $i < $this->faker()->randomDigit; $i++) {
            $params[$this->faker()->word] = $this->faker()->word;
        }

        return Api::of(new Client(), $this->httpMethod, $this->method, $this->params);
    }
}
