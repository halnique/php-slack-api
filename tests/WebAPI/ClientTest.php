<?php

namespace HalniqueTest\Slack\WebAPI;

use Halnique\Slack\WebAPI\Client;
use Halnique\Slack\WebAPI\Responses\ApiTest;
use Halnique\Slack\WebAPI\Responses\UsersLookupByEmail;
use HalniqueTest\Slack\TestCase;

class ClientTest extends TestCase
{
    public function test__construct()
    {
        $client = new Client(new Endpoints\Client());
        $this->assertInstanceOf(Client::class, $client);
        return $client;
    }

    public function testCreate()
    {
        $this->assertInstanceOf(Client::class, Client::create());
    }

    /**
     * @depends test__construct
     * @param Client $client
     */
    public function testApiTest(Client $client)
    {
        $this->assertInstanceOf(ApiTest::class, $client->apiTest());
    }

    /**
     * @depends test__construct
     * @param Client $client
     */
    public function testUsersLookupByEmail(Client $client)
    {
        $this->assertInstanceOf(UsersLookupByEmail::class,
            $client->usersLookupByEmail(\Faker\Factory::create()->email));
    }
}
