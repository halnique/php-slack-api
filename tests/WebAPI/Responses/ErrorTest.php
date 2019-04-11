<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\Error;
use HalniqueTest\Slack\TestCase;

class ErrorTest extends TestCase
{
    public function test__construct()
    {
        $this->assertInstanceOf(Error::class, new Error(\Faker\Factory::create()->word));
    }

    public function testValue()
    {
        $error = \Faker\Factory::create()->word;
        $this->assertEquals($error, (new Error($error))->value());
    }

    public function testEquals()
    {
        $error = \Faker\Factory::create()->word;
        $this->assertTrue((new Error($error))->equals(new Error($error)));
    }

    public function testJsonSerialize()
    {
        $error = \Faker\Factory::create()->word;
        $this->assertEquals((new Error($error))->value(), (new Error($error))->jsonSerialize());
        $this->assertEquals('"' . (new Error($error))->value() . '"', json_encode(new Error($error)));
    }

    public function test__toString()
    {
        $error = \Faker\Factory::create()->word;
        $this->assertEquals((new Error($error))->value(), (new Error($error))->__toString());
        $this->assertEquals((new Error($error))->value(), (new Error($error)));
    }
}
