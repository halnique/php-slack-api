<?php

namespace HalniqueTest\Slack\WebAPI;

use Halnique\Slack\WebAPI\Client;
use Halnique\Slack\WebAPI\Responses\OauthAccess;
use Halnique\Slack\WebAPI\Responses\ApiTest;
use Halnique\Slack\WebAPI\Responses\AuthTest;
use Halnique\Slack\WebAPI\Responses\UsersLookupByEmail;
use HalniqueTest\Slack\Mock\GuzzleHttpClient;
use HalniqueTest\Slack\TestCase;

class ClientTest extends TestCase
{
    /** @var Client */
    private $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new Client(new Endpoints\Client(new GuzzleHttpClient()));
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Client::class, $this->client);
    }

    public function testCreate()
    {
        $this->assertInstanceOf(Client::class, Client::create());
    }

    public function testOauthAccess()
    {
        $faker = \Faker\Factory::create();
        $this->assertInstanceOf(OauthAccess::class, $this->client->oauthAccess($faker->word, $faker->word, $faker->word));
    }

    public function testAuthTest()
    {
        $this->assertInstanceOf(AuthTest::class, $this->client->authTest());
    }

    public function testApiTest()
    {
        $this->assertInstanceOf(ApiTest::class, $this->client->apiTest());
    }

    public function testUsersLookupByEmail()
    {
        $this->assertInstanceOf(UsersLookupByEmail::class, $this->client->usersLookupByEmail(\Faker\Factory::create()->email));
    }
}
