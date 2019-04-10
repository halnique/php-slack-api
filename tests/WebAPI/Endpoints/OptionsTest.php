<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use HalniqueTest\Slack\TestCase;

class OptionsTest extends TestCase
{
    private static $params;

    private static $token;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        $faker = \Faker\Factory::create();

        foreach ($faker->words as $word) {
            self::$params[$faker->word] = $word;
        }

        self::$token = $faker->uuid;
    }

    public function test__construct()
    {
        $this->assertInstanceOf(Options::class, new Options(HttpMethod::get(), self::$params, self::$token));
        $this->assertInstanceOf(Options::class, new Options(HttpMethod::head(), self::$params, self::$token));
        $this->assertInstanceOf(Options::class, new Options(HttpMethod::post(), self::$params, self::$token));
        $this->assertInstanceOf(Options::class, new Options(HttpMethod::put(), self::$params, self::$token));
        $this->assertInstanceOf(Options::class, new Options(HttpMethod::delete(), self::$params, self::$token));
        $this->assertInstanceOf(Options::class, new Options(HttpMethod::patch(), self::$params, self::$token));
    }

    public function testValue()
    {
        $this->assertArrayHasKey('headers', (new Options(HttpMethod::get(), self::$params, self::$token))->value());
        $this->assertArrayHasKey('headers', (new Options(HttpMethod::head(), self::$params, self::$token))->value());
        $this->assertArrayHasKey('headers', (new Options(HttpMethod::post(), self::$params, self::$token))->value());
        $this->assertArrayHasKey('headers', (new Options(HttpMethod::put(), self::$params, self::$token))->value());
        $this->assertArrayHasKey('headers', (new Options(HttpMethod::delete(), self::$params, self::$token))->value());
        $this->assertArrayHasKey('headers', (new Options(HttpMethod::patch(), self::$params, self::$token))->value());
        foreach (self::$params as $key => $value) {
            $this->assertArrayHasKey($key, (new Options(HttpMethod::post(), self::$params, self::$token))->value());
            $this->assertArrayHasKey($key, (new Options(HttpMethod::put(), self::$params, self::$token))->value());
            $this->assertArrayHasKey($key, (new Options(HttpMethod::delete(), self::$params, self::$token))->value());
            $this->assertArrayHasKey($key, (new Options(HttpMethod::patch(), self::$params, self::$token))->value());
        }
    }

    public function testEquals()
    {
        $this->assertTrue((new Options(HttpMethod::get(), self::$params, self::$token))->equals(new Options(HttpMethod::get(), self::$params, self::$token)));
        $this->assertTrue((new Options(HttpMethod::head(), self::$params, self::$token))->equals(new Options(HttpMethod::head(), self::$params, self::$token)));
        $this->assertTrue((new Options(HttpMethod::post(), self::$params, self::$token))->equals(new Options(HttpMethod::post(), self::$params, self::$token)));
        $this->assertTrue((new Options(HttpMethod::put(), self::$params, self::$token))->equals(new Options(HttpMethod::put(), self::$params, self::$token)));
        $this->assertTrue((new Options(HttpMethod::delete(), self::$params, self::$token))->equals(new Options(HttpMethod::delete(), self::$params, self::$token)));
        $this->assertTrue((new Options(HttpMethod::patch(), self::$params, self::$token))->equals(new Options(HttpMethod::patch(), self::$params, self::$token)));
    }

    public function testJsonSerialize()
    {
        $this->assertArrayHasKey('headers', (new Options(HttpMethod::get(), self::$params, self::$token))->jsonSerialize());
        $this->assertArrayHasKey('headers', (new Options(HttpMethod::head(), self::$params, self::$token))->jsonSerialize());
        $this->assertArrayHasKey('headers', (new Options(HttpMethod::post(), self::$params, self::$token))->jsonSerialize());
        $this->assertArrayHasKey('headers', (new Options(HttpMethod::put(), self::$params, self::$token))->jsonSerialize());
        $this->assertArrayHasKey('headers', (new Options(HttpMethod::delete(), self::$params, self::$token))->jsonSerialize());
        $this->assertArrayHasKey('headers', (new Options(HttpMethod::patch(), self::$params, self::$token))->jsonSerialize());
        foreach (self::$params as $key => $value) {
            $this->assertArrayHasKey($key, (new Options(HttpMethod::post(), self::$params, self::$token))->jsonSerialize());
            $this->assertArrayHasKey($key, (new Options(HttpMethod::put(), self::$params, self::$token))->jsonSerialize());
            $this->assertArrayHasKey($key, (new Options(HttpMethod::delete(), self::$params, self::$token))->jsonSerialize());
            $this->assertArrayHasKey($key, (new Options(HttpMethod::patch(), self::$params, self::$token))->jsonSerialize());
        }
    }

    public function test__toString()
    {
        $this->assertEquals(new Options(HttpMethod::get(), self::$params, self::$token), json_encode((new Options(HttpMethod::get(), self::$params, self::$token))->value()));
        $this->assertEquals(new Options(HttpMethod::head(), self::$params, self::$token), json_encode((new Options(HttpMethod::head(), self::$params, self::$token))->value()));
        $this->assertEquals(new Options(HttpMethod::post(), self::$params, self::$token), json_encode((new Options(HttpMethod::post(), self::$params, self::$token))->value()));
        $this->assertEquals(new Options(HttpMethod::put(), self::$params, self::$token), json_encode((new Options(HttpMethod::put(), self::$params, self::$token))->value()));
        $this->assertEquals(new Options(HttpMethod::delete(), self::$params, self::$token), json_encode((new Options(HttpMethod::delete(), self::$params, self::$token))->value()));
        $this->assertEquals(new Options(HttpMethod::patch(), self::$params, self::$token), json_encode((new Options(HttpMethod::patch(), self::$params, self::$token))->value()));
    }
}
