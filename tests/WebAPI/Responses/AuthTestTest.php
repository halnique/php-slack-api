<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\AuthTest;
use HalniqueTest\Slack\TestCase;

class AuthTestTest extends TestCase
{
    private static $url;

    private static $team;

    private static $user;

    private static $teamId;

    private static $userId;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        $faker = \Faker\Factory::create();
        self::$url = $faker->url;
        self::$team = $faker->word;
        self::$user = $faker->word;
        self::$teamId = $faker->word;
        self::$userId = $faker->word;
    }

    public function test__construct()
    {
        $authTest = new AuthTest([
            'ok' => true,
            'url' => self::$url,
            'team' => self::$team,
            'user' => self::$user,
            'team_id' => self::$teamId,
            'user_id' => self::$userId,
        ]);
        $this->assertInstanceOf(AuthTest::class, $authTest);
        return $authTest;
    }

    /**
     * @depends test__construct
     * @param AuthTest $authTest
     */
    public function test__get(AuthTest $authTest)
    {
        $this->assertEquals(self::$url, $authTest->url);
        $this->assertEquals(self::$team, $authTest->team);
        $this->assertEquals(self::$user, $authTest->user);
        $this->assertEquals(self::$teamId, $authTest->teamId);
        $this->assertEquals(self::$userId, $authTest->userId);
    }

    /**
     * @depends test__construct
     * @param AuthTest $authTest
     */
    public function testJsonSerialize(AuthTest $authTest)
    {
        $this->assertArrayHasKey('url', $authTest->jsonSerialize());
        $this->assertArrayHasKey('team', $authTest->jsonSerialize());
        $this->assertArrayHasKey('user', $authTest->jsonSerialize());
        $this->assertArrayHasKey('team_id', $authTest->jsonSerialize());
        $this->assertArrayHasKey('user_id', $authTest->jsonSerialize());
    }

    /**
     * @depends test__construct
     * @param AuthTest $authTest
     */
    public function test__toString(AuthTest $authTest)
    {
        $this->assertEquals($authTest, json_encode($authTest));
    }
}
