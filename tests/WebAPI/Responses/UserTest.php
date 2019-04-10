<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\User;
use Halnique\String\Camelize;
use HalniqueTest\Slack\TestCase;

class UserTest extends TestCase
{
    private static $attributes = [];

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $faker = \Faker\Factory::create();
        self::$attributes = [
            'id' => $faker->word,
            'team_id' => $faker->word,
            'name' => $faker->name,
            'deleted' => $faker->boolean,
            'color' => $faker->colorName,
            'real_name' => $faker->name,
            'tz' => $faker->timezone,
            'tz_label' => $faker->timezone,
            'tz_offset' => $faker->unixTime,
            'profile' => null,
            'is_admin' => $faker->boolean,
            'is_owner' => $faker->boolean,
            'is_primary_owner' => $faker->boolean,
            'is_restricted' => $faker->boolean,
            'is_ultra_restricted' => $faker->boolean,
            'is_bot' => $faker->boolean,
            'updated' => $faker->unixTime,
            'is_app_user' => $faker->boolean,
            'has_2fa' => $faker->boolean,
            'locale' => $faker->locale,
            'presence' => $faker->word,
        ];
    }

    public function test__construct()
    {
        $user = new User(self::$attributes);
        $this->assertInstanceOf(User::class, $user);
        return $user;
    }

    /**
     * @depends test__construct
     * @param User $user
     */
    public function test__get(User $user)
    {
        foreach (self::$attributes as $key => $value) {
            $key = Camelize::lower($key);
            $this->assertEquals($value, $user->$key);
        }
    }

    /**
     * @depends test__construct
     * @param User $user
     */
    public function testJsonSerialize(User $user)
    {
        $this->assertArrayHasKey('id', $user->jsonSerialize());
        $this->assertArrayHasKey('team_id', $user->jsonSerialize());
        $this->assertArrayHasKey('name', $user->jsonSerialize());
        $this->assertArrayHasKey('deleted', $user->jsonSerialize());
        $this->assertArrayHasKey('color', $user->jsonSerialize());
        $this->assertArrayHasKey('real_name', $user->jsonSerialize());
        $this->assertArrayHasKey('tz', $user->jsonSerialize());
        $this->assertArrayHasKey('tz_label', $user->jsonSerialize());
        $this->assertArrayHasKey('tz_offset', $user->jsonSerialize());
        $this->assertArrayHasKey('profile', $user->jsonSerialize());
        $this->assertArrayHasKey('is_admin', $user->jsonSerialize());
        $this->assertArrayHasKey('is_owner', $user->jsonSerialize());
        $this->assertArrayHasKey('is_primary_owner', $user->jsonSerialize());
        $this->assertArrayHasKey('is_restricted', $user->jsonSerialize());
        $this->assertArrayHasKey('is_ultra_restricted', $user->jsonSerialize());
        $this->assertArrayHasKey('is_bot', $user->jsonSerialize());
        $this->assertArrayHasKey('updated', $user->jsonSerialize());
        $this->assertArrayHasKey('is_app_user', $user->jsonSerialize());
        $this->assertArrayHasKey('has_2fa', $user->jsonSerialize());
        $this->assertArrayHasKey('locale', $user->jsonSerialize());
        $this->assertArrayHasKey('presence', $user->jsonSerialize());
    }

    /**
     * @depends test__construct
     * @param User $user
     */
    public function test__toString(User $user)
    {
        $this->assertEquals($user, json_encode($user));
    }
}
