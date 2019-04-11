<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\OauthAccess;
use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;
use HalniqueTest\Slack\TestCase;

class OauthAccessTest extends TestCase
{
    private static $params;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
    }

    public function test__construct()
    {
        $faker = \Faker\Factory::create();
        $clientId = $faker->word;
        $clientSecret = $faker->word;
        $code = $faker->word;
        self::$params = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'code' => $code,
        ];
        $oauthAccess = new OauthAccess(new Client(), $clientId, $clientSecret, $code);
        $this->assertInstanceOf(OauthAccess::class, $oauthAccess);
        return $oauthAccess;
    }

    /**
     * @depends test__construct
     * @param OauthAccess $oauthAccess
     */
    public function testCall(OauthAccess $oauthAccess)
    {
        $this->assertInstanceOf(\Halnique\Slack\WebAPI\Responses\OauthAccess::class, $oauthAccess->call());
    }

    /**
     * @depends test__construct
     * @param OauthAccess $oauthAccess
     */
    public function testHttpMethod(OauthAccess $oauthAccess)
    {
        $this->assertEquals(HttpMethod::get(), $oauthAccess->httpMethod());
    }

    /**
     * @depends test__construct
     * @param OauthAccess $oauthAccess
     * @throws \ReflectionException
     */
    public function testUri(OauthAccess $oauthAccess)
    {
        $method = (new \ReflectionClass(OauthAccess::class))->getConstant('METHOD');
        $this->assertEquals(new Uri(HttpMethod::get(), $method, self::$params), $oauthAccess->uri());
    }

    /**
     * @depends test__construct
     * @param OauthAccess $oauthAccess
     */
    public function testOptions(OauthAccess $oauthAccess)
    {
        $this->assertEquals(new Options(HttpMethod::get(), self::$params), $oauthAccess->options());
    }
}
