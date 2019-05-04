<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use HalniqueTest\Slack\TestCase;

class OptionsTest extends TestCase
{
    private $params;

    private $token;

    protected function setUp(): void
    {
        parent::setUp();

        $faker = \Faker\Factory::create();

        foreach ($faker->words as $word) {
            $this->params[$faker->word] = $word;
        }

        $this->token = $faker->uuid;
    }

    public function testOf()
    {
        $this->assertInstanceOf(Options::class, Options::of(HttpMethod::get(), $this->params, $this->token));
        $this->assertInstanceOf(Options::class, Options::of(HttpMethod::head(), $this->params, $this->token));
        $this->assertInstanceOf(Options::class, Options::of(HttpMethod::post(), $this->params, $this->token));
        $this->assertInstanceOf(Options::class, Options::of(HttpMethod::put(), $this->params, $this->token));
        $this->assertInstanceOf(Options::class, Options::of(HttpMethod::delete(), $this->params, $this->token));
        $this->assertInstanceOf(Options::class, Options::of(HttpMethod::patch(), $this->params, $this->token));
    }

    public function testValue()
    {
        $this->assertArrayHasKey('headers', (Options::of(HttpMethod::get(), $this->params, $this->token))->value());
        $this->assertArrayHasKey('headers', (Options::of(HttpMethod::head(), $this->params, $this->token))->value());
        $this->assertArrayHasKey('headers', (Options::of(HttpMethod::post(), $this->params, $this->token))->value());
        $this->assertArrayHasKey('headers', (Options::of(HttpMethod::put(), $this->params, $this->token))->value());
        $this->assertArrayHasKey('headers', (Options::of(HttpMethod::delete(), $this->params, $this->token))->value());
        $this->assertArrayHasKey('headers', (Options::of(HttpMethod::patch(), $this->params, $this->token))->value());
        foreach ($this->params as $key => $value) {
            $this->assertArrayHasKey($key, (Options::of(HttpMethod::post(), $this->params, $this->token))->value());
            $this->assertArrayHasKey($key, (Options::of(HttpMethod::put(), $this->params, $this->token))->value());
            $this->assertArrayHasKey($key, (Options::of(HttpMethod::delete(), $this->params, $this->token))->value());
            $this->assertArrayHasKey($key, (Options::of(HttpMethod::patch(), $this->params, $this->token))->value());
        }
    }

    public function testEquals()
    {
        $this->assertTrue((Options::of(HttpMethod::get(), $this->params, $this->token))->equals(Options::of(HttpMethod::get(), $this->params, $this->token)));
        $this->assertTrue((Options::of(HttpMethod::head(), $this->params, $this->token))->equals(Options::of(HttpMethod::head(), $this->params, $this->token)));
        $this->assertTrue((Options::of(HttpMethod::post(), $this->params, $this->token))->equals(Options::of(HttpMethod::post(), $this->params, $this->token)));
        $this->assertTrue((Options::of(HttpMethod::put(), $this->params, $this->token))->equals(Options::of(HttpMethod::put(), $this->params, $this->token)));
        $this->assertTrue((Options::of(HttpMethod::delete(), $this->params, $this->token))->equals(Options::of(HttpMethod::delete(), $this->params, $this->token)));
        $this->assertTrue((Options::of(HttpMethod::patch(), $this->params, $this->token))->equals(Options::of(HttpMethod::patch(), $this->params, $this->token)));
    }

    public function testJsonSerialize()
    {
        $this->assertArrayHasKey('headers', (Options::of(HttpMethod::get(), $this->params, $this->token))->jsonSerialize());
        $this->assertArrayHasKey('headers', (Options::of(HttpMethod::head(), $this->params, $this->token))->jsonSerialize());
        $this->assertArrayHasKey('headers', (Options::of(HttpMethod::post(), $this->params, $this->token))->jsonSerialize());
        $this->assertArrayHasKey('headers', (Options::of(HttpMethod::put(), $this->params, $this->token))->jsonSerialize());
        $this->assertArrayHasKey('headers', (Options::of(HttpMethod::delete(), $this->params, $this->token))->jsonSerialize());
        $this->assertArrayHasKey('headers', (Options::of(HttpMethod::patch(), $this->params, $this->token))->jsonSerialize());
        foreach ($this->params as $key => $value) {
            $this->assertArrayHasKey($key, (Options::of(HttpMethod::post(), $this->params, $this->token))->jsonSerialize());
            $this->assertArrayHasKey($key, (Options::of(HttpMethod::put(), $this->params, $this->token))->jsonSerialize());
            $this->assertArrayHasKey($key, (Options::of(HttpMethod::delete(), $this->params, $this->token))->jsonSerialize());
            $this->assertArrayHasKey($key, (Options::of(HttpMethod::patch(), $this->params, $this->token))->jsonSerialize());
        }
    }

    public function test__toString()
    {
        $this->assertEquals(Options::of(HttpMethod::get(), $this->params, $this->token), json_encode((Options::of(HttpMethod::get(), $this->params, $this->token))->value()));
        $this->assertEquals(Options::of(HttpMethod::head(), $this->params, $this->token), json_encode((Options::of(HttpMethod::head(), $this->params, $this->token))->value()));
        $this->assertEquals(Options::of(HttpMethod::post(), $this->params, $this->token), json_encode((Options::of(HttpMethod::post(), $this->params, $this->token))->value()));
        $this->assertEquals(Options::of(HttpMethod::put(), $this->params, $this->token), json_encode((Options::of(HttpMethod::put(), $this->params, $this->token))->value()));
        $this->assertEquals(Options::of(HttpMethod::delete(), $this->params, $this->token), json_encode((Options::of(HttpMethod::delete(), $this->params, $this->token))->value()));
        $this->assertEquals(Options::of(HttpMethod::patch(), $this->params, $this->token), json_encode((Options::of(HttpMethod::patch(), $this->params, $this->token))->value()));
    }
}
