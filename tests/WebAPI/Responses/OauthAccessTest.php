<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\Bot;
use Halnique\Slack\WebAPI\Responses\IncomingWebhook;
use Halnique\Slack\WebAPI\Responses\OauthAccess;
use HalniqueTest\Slack\TestCase;

class OauthAccessTest extends TestCase
{
    private static $accessToken;

    private static $scope;

    private static $teamName;

    private static $teamId;

    private static $incomingWebhook;

    private static $bot;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        $faker = \Faker\Factory::create();
        self::$accessToken = $faker->uuid;
        self::$scope = $faker->word;
        self::$teamName = $faker->word;
        self::$teamId = $faker->word;
        self::$incomingWebhook = [];
        self::$bot = [];
    }

    public function test__construct()
    {
        $oauthAccess = new OauthAccess([
            'ok' => true,
            'access_token' => self::$accessToken,
            'scope' => self::$scope,
            'team_name' => self::$teamName,
            'team_id' => self::$teamId,
            'incoming_webhook' => self::$incomingWebhook,
            'bot' => self::$bot,
        ]);
        $this->assertInstanceOf(OauthAccess::class, $oauthAccess);
        return $oauthAccess;
    }

    /**
     * @depends test__construct
     * @param OauthAccess $oauthAccess
     */
    public function test__get(OauthAccess $oauthAccess)
    {
        $this->assertEquals(self::$accessToken, $oauthAccess->accessToken);
        $this->assertEquals(self::$scope, $oauthAccess->scope);
        $this->assertEquals(self::$teamName, $oauthAccess->teamName);
        $this->assertEquals(self::$teamId, $oauthAccess->teamId);
        $this->assertEquals(new IncomingWebhook(self::$incomingWebhook), $oauthAccess->incomingWebhook);
        $this->assertEquals(new Bot(self::$bot), $oauthAccess->bot);
    }

    /**
     * @depends test__construct
     * @param OauthAccess $oauthAccess
     */
    public function testJsonSerialize(OauthAccess $oauthAccess)
    {
        $this->assertArrayHasKey('access_token', $oauthAccess->jsonSerialize());
        $this->assertArrayHasKey('scope', $oauthAccess->jsonSerialize());
        $this->assertArrayHasKey('team_name', $oauthAccess->jsonSerialize());
        $this->assertArrayHasKey('team_id', $oauthAccess->jsonSerialize());
        $this->assertArrayHasKey('incoming_webhook', $oauthAccess->jsonSerialize());
        $this->assertArrayHasKey('bot', $oauthAccess->jsonSerialize());
    }

    /**
     * @depends test__construct
     * @param OauthAccess $oauthAccess
     */
    public function test__toString(OauthAccess $oauthAccess)
    {
        $this->assertEquals($oauthAccess, json_encode($oauthAccess));
    }
}
