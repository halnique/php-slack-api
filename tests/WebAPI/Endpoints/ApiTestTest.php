<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\ApiTest;
use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;
use HalniqueTest\Slack\Mock\GuzzleHttpClient;
use HalniqueTest\Slack\TestCase;

class ApiTestTest extends TestCase
{
    /** @var ApiTest */
    private $api;

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = new ApiTest(new Client(new GuzzleHttpClient()));

    }

    public function test__construct()
    {
        $this->assertInstanceOf(ApiTest::class, $this->api);
    }

    public function testCall()
    {
        $this->assertInstanceOf(\Halnique\Slack\WebAPI\Responses\ApiTest::class, $this->api->call());
    }

    public function testHttpMethod()
    {
        $this->assertEquals(HttpMethod::post(), $this->api->httpMethod());
    }

    public function testUri()
    {
        $this->assertEquals(Uri::of(HttpMethod::post(), ApiTest::METHOD), $this->api->uri());
    }

    public function testOptions()
    {
        $this->assertEquals(Options::of(HttpMethod::post(), []), $this->api->options());
    }

    public function testParams()
    {
        $this->assertEquals([], $this->api->params());
    }
}
