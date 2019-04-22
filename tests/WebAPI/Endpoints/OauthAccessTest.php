<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\OauthAccess;
use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;
use HalniqueTest\Slack\Mock\GuzzleHttpClient;
use HalniqueTest\Slack\TestCase;

class OauthAccessTest extends TestCase
{
    /** @var OauthAccess */
    private $api;

    private $params;

    protected function setUp(): void
    {
        parent::setUp();
        $faker = \Faker\Factory::create();
        $clientId = $faker->word;
        $clientSecret = $faker->word;
        $code = $faker->word;
        $this->api = new OauthAccess(new Client(new GuzzleHttpClient()), $clientId, $clientSecret, $code);
        $this->params = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'code' => $code,
        ];
    }

    public function test__construct()
    {
        $this->assertInstanceOf(OauthAccess::class, $this->api);
        return $this->api;
    }

    public function testCall()
    {
        $this->assertInstanceOf(\Halnique\Slack\WebAPI\Responses\OauthAccess::class, $this->api->call());
    }

    public function testHttpMethod()
    {
        $this->assertEquals(HttpMethod::get(), $this->api->httpMethod());
    }

    public function testUri()
    {
        $this->assertEquals(Uri::of(HttpMethod::get(), OauthAccess::METHOD, $this->params), $this->api->uri());
    }

    public function testOptions()
    {
        $this->assertEquals(Options::of(HttpMethod::get(), $this->params), $this->api->options());
    }

    public function testParams()
    {
        $this->assertEquals($this->params, $this->api->params());
    }
}
