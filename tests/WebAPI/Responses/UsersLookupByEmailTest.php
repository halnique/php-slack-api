<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\User;
use Halnique\Slack\WebAPI\Responses\UsersLookupByEmail;
use HalniqueTest\Slack\TestCase;

class UsersLookupByEmailTest extends TestCase
{
    public function test__construct()
    {
        $usersLookupByEmail = new UsersLookupByEmail(['ok' => true, 'user' => []]);
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
