<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\Bot;
use Halnique\String\Camelize;
use HalniqueTest\Slack\TestCase;

class BotTest extends TestCase
{
    private static $attributes = [];

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        $faker = \Faker\Factory::create();
        self::$attributes = [
            'bot_user_id' => $faker->word,
            'bot_access_token' => $faker->uuid,
        ];
    }

    public function test__construct()
    {
        $bot = new Bot(self::$attributes);
        $this->assertInstanceOf(Bot::class, $bot);
        return $bot;
    }

    /**
     * @depends test__construct
     * @param Bot $bot
     */
    public function test__get(Bot $bot)
    {
        foreach (self::$attributes as $key => $value) {
            $key = Camelize::lower($key);
            $this->assertEquals($value, $bot->$key);
        }
    }

    /**
     * @depends test__construct
     * @param Bot $bot
     */
    public function testJsonSerialize(Bot $bot)
    {
        foreach (self::$attributes as $key => $value) {
            $this->assertArrayHasKey($key, $bot->jsonSerialize());
        }
    }

    /**
     * @depends test__construct
     * @param Bot $bot
     */
    public function test__toString(Bot $bot)
    {
        $this->assertEquals($bot, json_encode($bot));
    }
}
