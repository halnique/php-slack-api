<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\User;
use Halnique\Slack\WebAPI\Responses\UsersLookupByEmail;
use HalniqueTest\Slack\TestCase;

class UsersLookupByEmailTest extends TestCase
{
    private static $attributes = [];

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        $faker = \Faker\Factory::create();
        self::$attributes = [
            'ok' => true,
            'error' => $faker->word,
            'user' => [],
        ];
    }

    public function test__construct()
    {
        $usersLookupByEmail = new UsersLookupByEmail(self::$attributes);
        $this->assertInstanceOf(UsersLookupByEmail::class, $usersLookupByEmail);
        return $usersLookupByEmail;
    }

    /**
     * @depends test__construct
     * @param UsersLookupByEmail $usersLookupByEmail
     */
    public function test__get(UsersLookupByEmail $usersLookupByEmail)
    {
        $this->assertEquals(new User([]), $usersLookupByEmail->user);
    }

    /**
     * @depends test__construct
     * @param UsersLookupByEmail $usersLookupByEmail
     */
    public function testJsonSerialize(UsersLookupByEmail $usersLookupByEmail)
    {
        $this->assertArrayHasKey('user', $usersLookupByEmail->jsonSerialize());
    }

    /**
     * @depends test__construct
     * @param UsersLookupByEmail $usersLookupByEmail
     */
    public function test__toString(UsersLookupByEmail $usersLookupByEmail)
    {
        $this->assertEquals($usersLookupByEmail, json_encode($usersLookupByEmail));
    }
}
