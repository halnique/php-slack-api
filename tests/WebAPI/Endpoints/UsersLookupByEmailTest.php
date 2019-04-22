<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;
use Halnique\Slack\WebAPI\Endpoints\UsersLookupByEmail;
use Halnique\Slack\WebAPI\Endpoints\WithAuthenticate;
use HalniqueTest\Slack\Mock\GuzzleHttpClient;
use HalniqueTest\Slack\TestCase;

class UsersLookupByEmailTest extends TestCase
{
    use WithAuthenticate;

    /** @var UsersLookupByEmail */
    private $api;

    private $params;

    protected function setUp(): void
    {
        parent::setUp();

        $email = \Faker\Factory::create()->email;
        $this->api = new UsersLookupByEmail(new Client(new GuzzleHttpClient()), $email);
        $this->params = [
            'email' => $email,
        ];
    }

    public function test__construct()
    {
        $this->assertInstanceOf(UsersLookupByEmail::class, $this->api);
    }

    public function testCall()
    {
        $this->assertInstanceOf(\Halnique\Slack\WebAPI\Responses\UsersLookupByEmail::class, $this->api->call());
    }

    public function testHttpMethod()
    {
        $this->assertEquals(HttpMethod::get(), $this->api->httpMethod());
    }

    public function testUri()
    {
        $this->assertEquals(Uri::of(HttpMethod::get(), UsersLookupByEmail::METHOD, $this->params), $this->api->uri());
    }

    public function testOptions()
    {
        $this->assertEquals(Options::of(HttpMethod::get(), $this->params, $this->token()), $this->api->options());
    }

    public function testParams()
    {
        $this->assertEquals($this->params, $this->api->params());
    }
}
