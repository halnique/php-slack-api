<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\User;
use Halnique\String\Camelize;
use HalniqueTest\Slack\TestCase;

class UserTest extends TestCase
{
    private static $attributes = [];

    public static function setUpBeforeClass(): void
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
        foreach (self::$attributes as $key => $value) {
            $this->assertArrayHasKey($key, $user->jsonSerialize());
        }
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
