<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\UserProfile;
use Halnique\String\Camelize;
use HalniqueTest\Slack\TestCase;

class UserProfileTest extends TestCase
{
    private static $attributes = [];

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $faker = \Faker\Factory::create();
        self::$attributes = [
            'real_name' => $faker->name,
            'display_name' => $faker->name,
            'avatar_hash' => $faker->md5,
            'real_name_normalized' => $faker->name,
            'display_name_normalized' => $faker->name,
            'image_24' => $faker->imageUrl(),
            'image_32' => $faker->imageUrl(),
            'image_48' => $faker->imageUrl(),
            'image_72' => $faker->imageUrl(),
            'image_192' => $faker->imageUrl(),
            'always_active' => $faker->boolean,
            'email' => $faker->email,
            'fields' => $faker->shuffleArray(),
            'first_name' => $faker->firstName,
            'guest_channels' => $faker->word,
            'image_512' => $faker->imageUrl(),
            'image_original' => $faker->imageUrl(),
            'last_name' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'skype' => $faker->word,
            'status_emoji' => $faker->word,
            'status_expiration' => $faker->unixTime,
            'status_text' => $faker->text,
            'status_text_canonical' => $faker->text,
            'team' => $faker->word,
            'title' => $faker->title,
        ];
    }

    public function test__construct()
    {
        $userProfile = new UserProfile(self::$attributes);
        $this->assertInstanceOf(UserProfile::class, $userProfile);
        return $userProfile;
    }

    /**
     * @depends test__construct
     * @param UserProfile $userProfile
     */
    public function test__get(UserProfile $userProfile)
    {
        foreach (self::$attributes as $key => $value) {
            $key = Camelize::lower($key);
            $this->assertEquals($value, $userProfile->$key);
        }
    }

    /**
     * @depends test__construct
     * @param UserProfile $userProfile
     */
    public function testJsonSerialize(UserProfile $userProfile)
    {
        $this->assertArrayHasKey('real_name', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('display_name', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('avatar_hash', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('real_name_normalized', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('display_name_normalized', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('image_24', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('image_32', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('image_48', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('image_72', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('image_192', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('always_active', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('email', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('fields', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('first_name', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('guest_channels', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('image_512', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('image_original', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('last_name', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('phone', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('skype', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('status_emoji', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('status_expiration', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('status_text', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('status_text_canonical', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('team', $userProfile->jsonSerialize());
        $this->assertArrayHasKey('title', $userProfile->jsonSerialize());
    }

    /**
     * @depends test__construct
     * @param UserProfile $userProfile
     */
    public function test__toString(UserProfile $userProfile)
    {
        $this->assertEquals($userProfile, json_encode($userProfile));
    }
}
