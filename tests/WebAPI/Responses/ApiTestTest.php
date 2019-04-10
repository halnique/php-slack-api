<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\ApiTest;
use HalniqueTest\Slack\TestCase;

class ApiTestTest extends TestCase
{
    private static $key;

    private static $value;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        $faker = \Faker\Factory::create();
        self::$key = $faker->word;
        self::$value = $faker->word;
    }

    public function test__construct()
    {
        $apiTest = new ApiTest(['ok' => true, 'args' => [self::$key => self::$value]]);
        $this->assertInstanceOf(ApiTest::class, $apiTest);
        return $apiTest;
    }

    /**
     * @depends test__construct
     * @param ApiTest $apiTest
     */
    public function test__get(ApiTest $apiTest)
    {
        $key = self::$key;
        $this->assertEquals(self::$value, $apiTest->$key);
    }

    /**
     * @depends test__construct
     * @param ApiTest $apiTest
     */
    public function testJsonSerialize(ApiTest $apiTest)
    {
        $this->assertArrayHasKey('args', $apiTest->jsonSerialize());
    }

    /**
     * @depends test__construct
     * @param ApiTest $apiTest
     */
    public function test__toString(ApiTest $apiTest)
    {
        $this->assertEquals($apiTest, json_encode($apiTest));
    }
}
