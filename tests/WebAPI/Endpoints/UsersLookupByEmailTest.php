<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;
use Halnique\Slack\WebAPI\Endpoints\UsersLookupByEmail;
use Halnique\Slack\WebAPI\Endpoints\WithAuthenticate;
use HalniqueTest\Slack\TestCase;

class UsersLookupByEmailTest extends TestCase
{
    use WithAuthenticate;

    private static $email;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        self::$email = \Faker\Factory::create()->email;
    }

    public function test__construct()
    {
        $usersLookupByEmail = new UsersLookupByEmail(new Client(), self::$email);
        $this->assertInstanceOf(UsersLookupByEmail::class, $usersLookupByEmail);
        return $usersLookupByEmail;
    }

    /**
     * @depends test__construct
     * @param UsersLookupByEmail $usersLookupByEmail
     */
    public function testCall(UsersLookupByEmail $usersLookupByEmail)
    {
        $this->assertInstanceOf(\Halnique\Slack\WebAPI\Responses\UsersLookupByEmail::class,
            $usersLookupByEmail->call());
    }

    /**
     * @depends test__construct
     * @param UsersLookupByEmail $usersLookupByEmail
     */
    public function testHttpMethod(UsersLookupByEmail $usersLookupByEmail)
    {
        $this->assertEquals(HttpMethod::get(), $usersLookupByEmail->httpMethod());
    }

    /**
     * @depends test__construct
     * @param UsersLookupByEmail $usersLookupByEmail
     * @throws \ReflectionException
     */
    public function testUri(UsersLookupByEmail $usersLookupByEmail)
    {
        $method = (new \ReflectionClass(UsersLookupByEmail::class))->getConstant('METHOD');
        $this->assertEquals(new Uri(HttpMethod::get(), $method, ['email' => self::$email]), $usersLookupByEmail->uri());
    }

    /**
     * @depends test__construct
     * @param UsersLookupByEmail $usersLookupByEmail
     */
    public function testOptions(UsersLookupByEmail $usersLookupByEmail)
    {
        $this->assertEquals(new Options(HttpMethod::get(), ['email' => self::$email], $this->token()),
            $usersLookupByEmail->options());
    }
}
