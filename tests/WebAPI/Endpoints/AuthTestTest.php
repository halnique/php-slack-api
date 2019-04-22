<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\AuthTest;
use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;
use Halnique\Slack\WebAPI\Endpoints\WithAuthenticate;
use HalniqueTest\Slack\Mock\GuzzleHttpClient;
use HalniqueTest\Slack\TestCase;

class AuthTestTest extends TestCase
{
    use WithAuthenticate;

    /** @var AuthTest */
    private $api;

    protected function setUp(): void
    {
        parent::setUp();
        $this->api = new AuthTest(new Client(new GuzzleHttpClient()));
    }

    public function test__construct()
    {
        $this->assertInstanceOf(AuthTest::class, $this->api);
    }

    public function testCall()
    {
        $this->assertInstanceOf(\Halnique\Slack\WebAPI\Responses\AuthTest::class, $this->api->call());
    }

    public function testHttpMethod()
    {
        $this->assertEquals(HttpMethod::post(), $this->api->httpMethod());
    }

    public function testUri()
    {
        $this->assertEquals(Uri::of(HttpMethod::post(), AuthTest::METHOD), $this->api->uri());
    }

    public function testOptions()
    {
        $this->assertEquals(Options::of(HttpMethod::post(), [], $this->token()), $this->api->options());
    }

    public function testParams()
    {
        $this->assertEquals([], $this->api->params());
    }
}
