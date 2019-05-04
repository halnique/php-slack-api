<?php

namespace HalniqueTest\Slack\WebAPI;

use Halnique\Slack\WebAPI\Client;
use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Responses\Response;
use HalniqueTest\Slack\TestCase;

class ClientTest extends TestCase
{
    public function test__construct()
    {
        $this->assertInstanceOf(Client::class, new Client(new Endpoints\Client()));
    }

    public function testCreate()
    {
        $this->assertInstanceOf(Client::class, Client::create());
    }

    public function testCall()
    {
        $this->assertInstanceOf(Response::class, Client::create()->call(
            $this->randomHttpMethod(),
            $this->faker()->word,
            $this->randomParams()
        ));
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
