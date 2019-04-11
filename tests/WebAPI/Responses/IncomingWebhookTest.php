<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\IncomingWebhook;
use Halnique\String\Camelize;
use HalniqueTest\Slack\TestCase;

class IncomingWebhookTest extends TestCase
{
    private static $attributes = [];

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        $faker = \Faker\Factory::create();
        self::$attributes = [
            'url' => $faker->url,
            'channel' => $faker->word,
            'configuration_url' => $faker->url,
        ];
    }

    public function test__construct()
    {
        $incomingWebhook = new IncomingWebhook(self::$attributes);
        $this->assertInstanceOf(IncomingWebhook::class, $incomingWebhook);
        return $incomingWebhook;
    }

    /**
     * @depends test__construct
     * @param IncomingWebhook $incomingWebhook
     */
    public function test__get(IncomingWebhook $incomingWebhook)
    {
        foreach (self::$attributes as $key => $value) {
            $key = Camelize::lower($key);
            $this->assertEquals($value, $incomingWebhook->$key);
        }
    }

    /**
     * @depends test__construct
     * @param IncomingWebhook $incomingWebhook
     */
    public function testJsonSerialize(IncomingWebhook $incomingWebhook)
    {
        foreach (self::$attributes as $key => $value) {
            $this->assertArrayHasKey($key, $incomingWebhook->jsonSerialize());
        }
    }

    /**
     * @depends test__construct
     * @param IncomingWebhook $incomingWebhook
     */
    public function test__toString(IncomingWebhook $incomingWebhook)
    {
        $this->assertEquals($incomingWebhook, json_encode($incomingWebhook));
    }
}
